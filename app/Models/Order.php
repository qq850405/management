<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'buyer_id',
        'billing_email',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_phone',
        'billing_name_on_card',
        'billing_total',
        'payment_gateway',
        'error',
    ];

    public  function orderProduct(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function getSellerOrder()
    {
        return $this
            ->query()
            ->select( [
                'orders.id',
                'buyer_id',
                'billing_email',
                'billing_name',
                'billing_address',
                'billing_city',
                'billing_phone',
                'billing_name_on_card',
                'billing_total',
                'payment_gateway',
                'error',
                'orders.created_at',
                'orders.status as status'])
            ->join('order_product','order_product.order_id','orders.id')
            ->join('products','products.id','order_product.product_id')
            ->latest('orders.created_at')
            ->groupBy('orders.id')
            ->get();

    }
    public function getSellerOrderDetail($order_id)
    {
        return $this
            ->query()
            ->select([
                'orders.id',
                'buyer_id',
                'billing_email',
                'billing_name',
                'billing_address',
                'billing_city',
                'billing_phone',
                'billing_name_on_card',
                'billing_total',
                'payment_gateway',
                'error',
                'orders.created_at',
                'products.name as name',
                'products.price as price',
                'order_product.quantity as quantity',
                'orders.created_at as created_at',
                'orders.status as status'
            ])
            ->join('order_product','order_product.order_id','orders.id')
            ->join('products','products.id','order_product.product_id')
            ->where('orders.id',$order_id)
            ->latest('created_at')
            ->get();
    }

    public function getBuyerOrder()
    {
        return $this
            ->query()
            ->where('buyer_id',Auth::id())
            ->latest()
            ->get();
    }

    public function getBuyerOrderDetail()
    {
        return $this
            ->query()
            ->join('order_product','order_product.order_id','orders.id')
            ->where('buyer_id',Auth::id())
            ->latest('orders.created_at')
            ->get();
    }
}
