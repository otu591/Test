<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['client_email','status'];//разрешеные поля для записи
    
    public function products(){
     
      return $this->belongsToMany('App\Product','order_products','order_id','product_id')->withPivot('quantity', 'price');
    
    }

    public function partner(){
    
        return $this->belongsTo('App\Partner');
        
    }
}
