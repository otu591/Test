<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function vendors(){
        
        return $this->belongsTo('App\Vendor','vendor_id');
        
    }
    public function orders()
    {

     return $this->belongsToMany('App\Order','order_products','product_id','order_id')->withPivot('quantity', 'price');
    }
}
