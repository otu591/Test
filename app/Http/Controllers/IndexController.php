<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function show(){
        return view(env('THEME').'.layouts.home')->withTitle('Просмотр заказов');
    }
}
