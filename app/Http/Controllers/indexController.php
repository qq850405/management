<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class indexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $order = new Order();
        $orders = $order->getSellerOrder();

        return view('index', compact('orders'));
    }
    public function getCSRFToken(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['token' => csrf_token()]);
    }
}
