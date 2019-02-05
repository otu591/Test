<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class editOrderController extends Controller
{
    //

        public function show($id){
                $arrInfProduct = array();
                $sumOrder=0;
                $order=Order::find($id);
                
                $id_order=$order->id;
            
                $client_email=$order->client_email;


                foreach ($order->products as $product) {
                    
                    $sumOrder+=(($product->price)*($product->pivot->quantity));

                    array_push($arrInfProduct, $product->name .' - ' . $product->pivot->quantity . ' ед.');
                }
//            $collection->implode('product', ', ');

                $str_products=implode(", ", $arrInfProduct);//строка продуктов в заказе
      
                $partner_name = $order->partner->name;//инфо. об партнер
  
                $order_status = $order->status;//status заказa
           
 
           
            return view(env('THEME').'.editOrder')->with(['title'=>'Редактирование материала',
                    'order' => $order,
                    'id_order'=>$id_order,
                    'client_email'=>$client_email,
                    'partner_name' => $partner_name,
                    'str_products' => $str_products,
                    'order_status' => $order_status,
                    'sumOrder' => $sumOrder]);
                    
            
        }
        
        public function store(Request $request){

            $this->validate($request, [
                'client_email' => 'required|email',
                'partner' => 'required',
                'status' => 'required|integer',
            ]);
    
          //  $user=Auth::user();
            $data=$request->except('_token');
    
            $order=Order::find($data['id']);

            $order->client_email=$data['client_email'];
            $order->status=$data['status'];
            $order->partner->name=$data['partner'];
            $order->push();

            return redirect()->back()->with(['message'=>'Заказ обновлен!']);

        }

}
