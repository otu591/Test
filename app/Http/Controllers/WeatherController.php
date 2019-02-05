<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    public function show(){

            return view(env('THEME').'.weather');
    }
}
