<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function showOrder(){
        $order = new Order();
        return $order->getSellerOrder()->get();
    }


    public function showOrderDetail(Request $request){
        $data = $request->validate([
            'order_id' => ['required', 'integer'],
        ]);
        $order = new Order();
        $detail = $order->getSellerOrderDetail($data['order_id']);
        return view('order',compact('detail'));

    }

    public function updateOrder(Request $request){
        $data = $request->validate([
            'order_id' => ['required', 'integer'],
            'status' => ['required', 'string', 'max:10'],
        ]);
        $order = Order::query()->find($data['order_id']);
        $order->status = $data['status'];
        $order->save();
        return redirect()->back();
    }
}
