<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function get_product_by_location($location){
        return Product::where('product_location_id',$location)->get();
    }
}
