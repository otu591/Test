<?php

namespace App\Http\Controllers;

use App\Order;

use App\Partner;
use Illuminate\Http\Request;

class ordersController extends Controller
{
protected $valStatus=array("0"=>"новый","10"=>"подтверждён","20"=>"завершён");

    
    public function show()
    {
    
//        поля
//ид_заказа
//название_партнера
//стоимость_заказа
//наименование_состав_заказа
//статус_заказа
//ид_заказа - ссылка на редактирование заказа в новой вкладке
    
       // $orders=Instrument::with('products')->get()
        
        $orders = Order::paginate(15);//find(3);

        $view=view(env('THEME').'.orders')->with(['vars'=> $orders,'var_status'=>$this->valStatus])->render();
 
        return view(env('THEME').'.indexOrders')->with(['view'=>$view,'title'=>'заголовок']);//формирование шаблона из переменных
    }
    public static function getSumma($obj){
//        $vars=array();
        $sumOrder=0;
        
        foreach ($obj->products as $product) {

            $sumOrder+=(($product->price)*($product->pivot->quantity));
   
        }

        return $sumOrder;
    }

  
    
    
    
}