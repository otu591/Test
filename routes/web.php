<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
  
   
    Route::get('/', ['as'=>'home','uses'=>'IndexController@show']);
    Route::get('/weather', ['as'=>'weather','uses'=>'WeatherController@show']);
    
    Route::group(['middleware'=>'web'],function (){
        Route::get('/orders', ['uses'=>'ordersController@show','as'=>'orders',]);
       
    
        Route::get('/editOrder/{id}',['uses'=>'editOrderController@show', 'as'=>'editOrder']);//
        Route::post('/editOrder/{id}', ['uses'=>'editOrderController@store', 'as'=>'editOrder']);
    });