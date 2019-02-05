<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable=['name'];//разрешеные поля для записи
    public function orders()
    {

        return $this->hasMany('App\Order','partner_id','id');
    }
   
}
