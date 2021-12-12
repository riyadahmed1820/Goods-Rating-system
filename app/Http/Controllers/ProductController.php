<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Location;
use App\Category;
use App\Cart;
use Session;
class ProductController extends Controller
{


    public function addproduct(){
        $locations = Location::All();
    	$categories = Category::All()->pluck('category_name','category_name');
        return view('admin.addproduct')->with('categories',$categories)->with('locations',$locations);
    }

    public function saveproduct(Request $request){
        return $request;   
    		$this->validate($request, ['product_name' => 'required',
    	                               'product_price' => 'required',
    	                               'product_image'=> 'image|nullable|max:1999']);

                                

           if ($request->input('product_category')){
    		if ($request->hasFile('product_image')){
    			$fileNameWithExt = $request->file('product_image')->getClientOriginalName();

    			$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

    			$extension = $request->file('product_image')->getClientOriginalExtension();

    			$fileNameToStore = $fileName.'_'.time().'.'.$extension;

    			$path = $request->file('product_image')->storeAs('public/product_image',$fileNameToStore);
    		}

    		else{
    				$fileNameToStore = 'noimage.jpg';
    		}

    		$product = new Product();

    		$product->product_name = $request->input('product_name');
            $product->product_price = $request->input('product_price');
            $product->product_category = $request->input('product_category');
            $product->product_location_id = $request->input('product_location_id');
            $product->category_id = $request->input('category_id');
            $product->product_image  = $fileNameToStore;
            $product->status = 1;
           	$product->save();
           return redirect('/addproduct')->with('status','The '.$product->product_name.' has been saved successfully' );
       }

       else{
       	return redirect('/addproduct')->with('status1','Select Category please' );
       }



    }

      public function products(){

        $products = Product::get();
        return view('admin.products')->with('products',$products);
    }

    public function editproduct($id){
        $locations = Location::All();
        $categories = Category::All()->pluck('category_name','category_name');
        $product = product::find($id);
        return view('admin.editproduct')->with('product', $product)->with('categories', $categories)->with('locations',$locations);
    }

    public function updateproduct(Request $request){
       // $checkcat = Category::where('category_name', $request->input('category_name'))->first();

        //$category = new Category();

        //if(!$checkcat){
         $this->validate($request, ['product_name' => 'required',
                                       'product_price' => 'required',
                                       'product_image'=> 'image|nullable|max:1999']);
            $product = Product::find($request->input('id'));
            $product->product_name = $request->input('product_name');
            $product->product_price = $request->input('product_price');
            $product->product_category = $request->input('product_category');
            $product->product_location_id = $request->input('product_location_id');

            if ($request->hasFile('product_image')){
                $fileNameWithExt = $request->file('product_image')->getClientOriginalName();

                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                $extension = $request->file('product_image')->getClientOriginalExtension();

                $fileNameToStore = $fileName.'_'.time().'.'.$extension;

                $path = $request->file('product_image')->storeAs('public/product_image',$fileNameToStore);

                $old_image = Product::find($request->input('id'));

                if($old_image->product_image != 'noimage.jpg'){
                    Storage::delete('public/product_image/'.$old_image->product_image);
                }

                $product->product_image  = $fileNameToStore;
            }
            $product->update();

            return redirect('/products')->with('status','The '.$product->price_name.' has been updated successfully' );

    }

    public function deleteproduct($id){

        $product = Product::find($id);
        if($product->product_image != 'noimage.jpg'){
                    Storage::delete('public/product_image/'.$product->product_image);
                }
        $product->delete();
        return redirect('/products')->with('status','The '.$product->product_name.' has been deleted successfully' );
    }

    public function deactivateproduct($id){

        $product = Product::find($id);
        $product->status = 0;
        $product->update();
        return redirect('/products')->with('status','The '.$product->product_name.' has been deactivated' );
   }

   public function activateproduct($id){

        $product = Product::find($id);
        $product->status = 1;
        $product->update();
        return redirect('/products')->with('status','The '.$product->product_name.' has been activated successfully' );
   }





}
