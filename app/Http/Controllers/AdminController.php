<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Complain;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function dashboard(){
        return view('admin.dashboard');
    }

    public function orders(){
    	$orders = Order::get();

    	$orders->transform(function($order,$key){
    		$order->cart =unserialize($order->cart);
    		return $order;
    	});

        return view('admin.orders')->with('orders',$orders);
    }

    public function complains(){
    	$complains = Complain::get();
        return view('admin.complains')->with('complains',$complains);
    }

    public function profile(){
        $users= user::get();
        $orders= order::get()->where('email',Auth::guard('admin')->user()->email);
    $orders->transform(function($order,$key){
        $order->cart =unserialize($order->cart);
        return $order;
    });
    return view('admin.profile')->with('users',$users)->with('orders',$orders);
    }

    public function editprofile(){
        $users= user::get();
    
        return view('admin.editprofile')->with('users',$users);
    }
    public function updateprofile(Request $request){
        $user= user::get()->where('id',Auth::guard('admin')->user()->id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        if($user->save()){
            return redirect('/profile');
        }
    
    }

    public function varifycomplain($id){

        $complain = Complain::find($id);
        $complain->status = 'processing';
        $complain->update();
        return redirect('/complains')->with('status','Varification fail' );
   }

   public function takestep($id){

        $complain = Complain::find($id);
        $complain->status = 'step taken';
        $complain->update();
        return redirect('/complains')->with('status','Step taken Successfully' );
   }

}
