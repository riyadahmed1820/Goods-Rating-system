<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slider;

class SliderController extends Controller
{


	public function addslider(){
        return view('admin.addslider');
    }


  	public function saveslider(Request $request){
    		$this->validate($request, ['description_one' => 'required',
    	                               'description_two' => 'required',
    	                               'slider_image'=> 'image|nullable|max:1999']);


    		if ($request->hasFile('slider_image')){
    			$fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

    			$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

    			$extension = $request->file('slider_image')->getClientOriginalExtension();

    			$fileNameToStore = $fileName.'_'.time().'.'.$extension;

    			$path = $request->file('slider_image')->storeAs('public/slider_image',$fileNameToStore);
    		}

    		else{
    				$fileNameToStore = 'noimage.jpg';
    		}

    		$slider = new Slider();

    		$slider->description1 = $request->input('description_one');
            $slider->description2 = $request->input('description_two');
            $slider->slider_image  = $fileNameToStore;
            $slider->status = 1;
           	$slider->save();
           return redirect('/addslider')->with('status','The Slider has been saved successfully' );
       }



    public function sliders(){
    	$sliders = Slider::get();
        return view('admin.sliders')->with('sliders',$sliders);
    }


    public function editslider($id){
        //$categories = Category::All()->pluck('category_name','category_name');
        $slider = Slider::find($id);
        return view('admin.editslider')->with('slider', $slider);// ->with('categories', $categories);
    }

    public function updateslider(Request $request){
       // $checkcat = Category::where('category_name', $request->input('category_name'))->first();

        //$category = new Category();

        //if(!$checkcat){
         $this->validate($request, ['description_one' => 'required',
                                       'description_two' => 'required',
                                       'slider_image'=> 'image|nullable|max:1999']);
            $slider = Slider::find($request->input('id'));
            $slider->description1 = $request->input('description_one');
            $slider->description2 = $request->input('description_two');


            if ($request->hasFile('slider_image')){
                $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                $extension = $request->file('slider_image')->getClientOriginalExtension();

                $fileNameToStore = $fileName.'_'.time().'.'.$extension;

                $path = $request->file('slider_image')->storeAs('public/slider_image',$fileNameToStore);

                $old_image = Slider::find($request->input('id'));

                if($old_image->slider_image != 'noimage.jpg'){
                    Storage::delete('public/slider_image/'.$old_image->slider_image);
                }

                $slider->slider_image  = $fileNameToStore;
            }
            $slider->update();

            return redirect('/sliders')->with('status','The Slider has been updated successfully' );

    }

    public function deleteslider($id){

        $slider = Slider::find($id);
        if($slider->slider_image != 'noimage.jpg'){
                    Storage::delete('public/slider_image/'.$slider->slider_image);
                }
        $slider->delete();
        return redirect('/sliders')->with('status','The Slider has been deleted successfully' );
    }

    public function deactivateslider($id){

        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();
        return redirect('/sliders')->with('status','The Slider has been deactivated' );
   }

   public function activateslider($id){

        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->update();
        return redirect('/sliders')->with('status','The Slider has been activated successfully' );
   }





}
