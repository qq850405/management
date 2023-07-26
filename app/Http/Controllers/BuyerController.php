<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function showOrder()
    {
        $order = new Order();
        return $order->getBuyerOrder();
    }
    public function showOrderDetail(Order $order)
    {
        return $order->getBuyerOrderDetail();
    }
    public function buyOrder(Request $request)
    {
        try {
            $cart = new Cart();
            $data = $request->validate([
                'seller_id' => ['required', 'integer'],
                'billing_email' => ['required', 'string','email'],
                'billing_name' => ['required', 'string'],
                'billing_address' => ['required', 'string'],
                'billing_city' => ['required', 'string'],
                'billing_phone' => ['required', 'string'],
                'billing_name_on_card' => ['required', 'string'],
                'payment_gateway' => ['required', 'string'],
                'error' => ['string'],
            ]);
            $sellerId = $data['seller_id'];
            if (!$cart->getBuyerCart($sellerId)->exists()) {
                throw new Exception('');
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'The given data was invalid.']);
        }

        DB::beginTransaction();
        try {
            $carts = $cart->getBuyerCart($sellerId)->get();
            $order = new Order;
            $order->buyer_id = Auth::id();
            $order->billing_email = $data['billing_email'];
            $order->billing_name = $data['billing_name'];
            $order->billing_address = $data['billing_address'];
            $order->billing_city = $data['billing_city'];
            $order->billing_phone = $data['billing_phone'];
            $order->billing_name_on_card = $data['billing_name_on_card'];
            $order->billing_total = $cart->getCartTotal($sellerId)->subtotal;
            $order->payment_gateway = $data['payment_gateway'];
            $order->error = $data['error'];
            $order->save();

            foreach ($carts as $cart) {

                $op = new OrderProduct;
                $op->order_id = $order->id;
                $op->product_id = $cart->product_id;
                $op->quantity = $cart->quantity;
                $op->save();

                $product = new Product;
                $product->deductInventory($cart->product_id,$cart->quantity);
                $product->update();

                $cart->updateCartSatuts($sellerId,'bought');
                $cart->delete();
            }

            DB::commit();
            return response(['message' => 'Order created succeed.'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            dd(response(['message' => $e], 500));
        }
    }

    public function cancelOrder()
    {

    }
}
