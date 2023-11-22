<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;


class OrderApiController extends Controller
{
        public function store(Request $request) {
        $valid = $request->validate([
            'order_userid' => 'required',
            'order_address' => 'required',
            'order_pricedelivery' => 'required',
            'order_price' => 'required',
            'order_datetime' => 'nullable',
        ]);

        $order = new Order;
         $order->order_userid = $request->order_userid;
         $order->order_address = $request->order_address;
         $order->order_pricedelivery = $request->order_pricedelivery;
         $order->order_price = $request->order_price;
         $order->order_datetime = $request->order_datetime;

          $order->save();
        $max = Order::max('order_id');
         $carts = Cart::where('user_id',$request->order_userid)->where('cart_order',0)->get();
         foreach($carts as $cart){
            $cart->cart_order = $max;
            $cart->update();
         }
        return response([
            'message'=>'success',
            'orders'=>$order,
        ],200);
    }
}
