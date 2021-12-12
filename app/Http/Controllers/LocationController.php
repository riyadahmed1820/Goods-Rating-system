<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Location;
use App\Product;
use Session;

class LocationController extends Controller
{
    

    public function addlocation(){
        return view('admin.addlocation');
    }

    public function savelocation(Request $request){

    	$this->validate($request, ['location_name' => 'required']);

        $checkloc = Location::where('location_name', $request->input('location_name'))->first();

        $location = new Location();

        if(!$checkloc){
        	$location->location_name = $request->input('location_name');
        	$location->save();

        	return redirect('/addlocation')->with('status','The '.$location->location_name.' Location has been saved successfully' );
        }
        else{
        	return redirect('/addlocation')->with('status1','The '.$request->input('location_name').' Location already exist' );

        }
    }

    public function locations(){

    	$locations = Location::get();
        return view('admin.locations')->with('locations', $locations);
    }

    public function edit($id){

    	$location = Location::find($id);
        return view('admin.editlocation')->with('location', $location);
    }

    public function updatelocation(Request $request){
       // $checkcat = Category::where('category_name', $request->input('category_name'))->first();

        //$category = new Category();

        //if(!$checkcat){
          
        	$location = Location::find($request->input('id'));
            $oldloc = $location->location_name;
        	$location->location_name = $request->input('location_name');
            
        	$location->update();

        	return redirect('/locations')->with('status','The '.$location->location_name.' Location has been updated successfully' );
        //}
        /*else{
        	return redirect('/addcategory')->with('status1','The '.$request->input('category_name').' Category already exist' );

        }*/
    }

    public function delete($id){

    	$location = Location::find($id);
    	$location->delete();
        return redirect('/locations')->with('status','The '.$location->location_name.' Location has been deleted successfully' );
    }

    public function view_by_loc($name){

        $locations  = Location::get();
        $products = Product::where('product_location', $name)->get();

        return view('client.compare')->with('products',$products)->with('locations',$locations);
    }
}
