<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use App\Location;
use App\Cart;
use App\Order;
use Stripe\Charge;
use Stripe\Stripe;
use App\Client;
use App\Complain;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    public function home(){
        $sliders= Slider::where('status',1)->get();
        $products= Product::where('status',1)->get();
        return view('client.home')->with('sliders',$sliders)->with('products',$products);
    }

    public function shop(){
        $categories= Category::get();
        $products= Product::where('status',1)->get();/* paginate(16); */
        return view('client.shop')->with('products',$products)->with('categories',$categories);
    }

    public function view_by_cat($name){
        $categories= Category::get();
        $products = Product::where('product_category',$name)->get();
        return view('client.shop')->with('products',$products)->with('categories',$categories);
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }

       public function addToCart($id){
        $product = Product::find($id);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/shop');
    }


    public function updateqty(Request $request){

        //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/cart');

    }

    public function removeitem($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/cart');
    }

    public function checkout(){

        if(!Session::has('client')){
            return redirect('/client_login');
        }

        if(!Session::has('cart')){
            return redirect('/cart');
        }
        return view('client.checkout');
    }

    public function postcheckout(Request $request){
         if(!Session::has('cart')){
            return redirect('/cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_51IZhKwLPanEYYPGjUVSML4GeCz0ef4bQ8g0h0YmKGxQKc8me0GGexV5wav230GyPfF6n5FhXYHvAqyWifEEN5Moi00zYw1i6wI');

        try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

            $order = new Order();
            $order->name = $request->input('name');
            $order->email = Auth::user()->email;
            $order->address = $request->input('address');
            $order->cart = serialize($cart);
            $order->payment_id = $charge->id;
            $order->order_number = 'ORD-'.strtoupper(Str::random(10));
            $order->status = 'pending';

            $order->save();

            $orders = Order::where('payment_id',$charge->id)->get();

            $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

            $email = Auth::user()->email;

            Mail::to($email)->send(new SendMail($orders));



        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/checkout');
        }

        Session::forget('cart');
        return redirect('/cart')->with('success', 'Purchase accomplished successfully !');

    }

    public function login(){
        return view('client.login');
    }

    public function signup(){
        return view('client.signup');
    }

    public function createaccount(Request $request){
        $this->validate($request,['email' => 'email|required|unique:clients',
                                    'name' => 'required',
                                   'password' => 'required|min:4']);

        $client = new User();
        $client->type = 'user';
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));

        $client->save();

        return back()->with('status','Your account has been created successfully');
    }

    public function accessaccount(Request $request){
        $this->validate($request,['email' => 'email|required',
                                   'password' => 'required']);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            Session::put('client','');
            return redirect('/shop');
        }else{
            //return \back()->with('error','Crediential does not matched');
            return \back()->withInput($request->only('email'))->with('error','Crediential does not matched in our records');
        }

        /* $client = User::where('email',$request->input('email'))->first();

        if($client){

            if(Hash::check($request->input('password'),$client->password)){

                Session::put('client',$client);
                return redirect('/shop');
                //return back()->with('status','Your email is'.Session::get('client')->id);
            }

            else{

                return back()->with('error','Wrong password or email');
            }

        }
        else{

            return back()->with('error','Your do not have an account');
        } */

    }
    public function search(Request $request){

		$query =  $request->input('query');
        $categories= Category::get();
        $products= Product::where('product_name','like',"%$query%")->get();
        return view('client.shop')->with('products',$products)->with('categories',$categories);
}

public function dashboard(){
    $users= user::get();
    $orders= order::get()->where('email',Auth::guard('web')->user()->email);
    $orders->transform(function($order,$key){
        $order->cart =unserialize($order->cart);
        return $order;
    });
    return view('client.dashboard')->with('users',$users)->with('orders',$orders);
    $order = Order::where('order_number',$id)->first();
    return view('client.dashboard',compact('order'));
}
public function report(){
    $users= user::get()->where('id',Auth::guard('web')->user()->id)->first();
    $products= Product::where('status',1)->get();
    $locations= Location::get();
    $complains= Complain::get();
    return view('client.report')->with('users',$users)->with('products',$products)->with('locations',$locations)->with('complains',$complains);
}

public function postreport(Request $request){
     
    //return $request->file('img')->getClientOriginalName();
        
    if ($request->file('img') ){
        $fileNameWithExt = $request->file('img')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        
        $extension = $request->file('img')->getClientOriginalExtension();
        
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //$path = $request->file('img')->storeAs('public/complain',$fileNameToStore);
        $path = $request->file('img')->move(public_path('source/back/profile'),$fileNameToStore);


        
    }

    else{
            $fileNameToStore = 'noimage.jpg';
    }
          
    $complain = new Complain();
          $complain->name = Auth::user()->name;
        $complain->email = Auth::user()->email;
        $complain->files=$fileNameToStore;
          
       $complain->product_location = $request->product_location;
        $complain->complain = $request->input('complain');
        $complain->save();




   return redirect('/report')->with('success', 'Your reported successfully !');
   

}

public function editdashboard(){
    $users= user::get();

    return view('client.editdashboard')->with('users',$users);
}
public function updatedashboard(Request $request){
    $user= user::get()->where('id',Auth::guard('web')->user()->id)->first();
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if($user->save()){
        return redirect('/dashboard');
    }

}


public function compare(){
    $locations= Location::get();
    $products= Product::where('status',1)->get();
    return view('client.compare')->with('products',$products)->with('locations',$locations);
}

public function view_by_loc($id){
    $locations= Location::get();
    $products = Product::where('product_location_id',$id)->get();
    return view('client.compare')->with('products',$products)->with('locations',$locations);
}

public function searchloc(Request $request){

    $query =  $request->input('query');
    $locations= Location::get();
    $categories= Category::get();
    $location= Location::where('location_name','like',"%$query%")->first();
    $products= Product::get_product_by_location($location->id);
    return view('client.compare')->with('products',$products)->with('categories',$categories)->with('locations',$locations);
}



}
