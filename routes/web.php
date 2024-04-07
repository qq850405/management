<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

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
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('api.login');
Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/', [indexController::class, 'index'])->name('index');
    Route::get('/getCSRFToken', [indexController::class, 'getCSRFToken'])->name('getCSRFToken');
    Route::get('/menu', [ProductController::class, 'index']);
    Route::get('/shop', [ProductController::class, 'shop']);
    Route::get('/add_to_cart', [ProductController::class, 'shop']);
    Route::post('/register', [UserController::class, 'register'])->name('api.register');
    Route::get('/register', [UserController::class, 'registerPage'])->name('register');

    Route::get('/posts/uid={user}', [PostController::class, 'index']);
    Route::get('/posts/post_id={post}', [PostController::class, 'show']);
    Route::get('/products/seller_id={user}', [ProductController::class, 'index']);
    Route::get('/products/product_id={product}', [ProductController::class, 'show']);

    Route::get('/order/detail', [SellerController::class, 'showOrderDetail']);
    Route::get('/order/update', [SellerController::class, 'updateOrder']);
    Route::get('/product/add', [ProductController::class, 'addProduct']);
    Route::post('/product/add', [ProductController::class, 'addProductAction']);
    Route::get('/product/list', [ProductController::class, 'showProductList']);
    Route::get('/product/update', [ProductController::class, 'showProductUpdate']);
    Route::get('/product/onlineordering/update', [ProductController::class, 'updateAllOnlineOrdering']);
    Route::post('/product/update', [ProductController::class, 'productUpdateAction']);
    Route::get('/product/delete', [ProductController::class, 'productDelete']);
    Route::get('/product/delete_photo', [ProductController::class, 'deleteProductPhoto']);



        Route::get('/logout', [UserController::class, 'logout']);

        Route::post('/posts', [PostController::class, 'store']);
        Route::post('/posts/{post}', [PostController::class, 'update']);
        Route::delete('/posts/{post}', [PostController::class, 'destroy']);

        Route::post('/products', [ProductController::class, 'store']);
        Route::post('/products/{product}', [ProductController::class, 'update']);
        Route::delete('/products/{product}', [ProductController::class, 'destroy']);

        Route::get('/cart',[CartController::class, 'showCart'])->name('cart.show');
        Route::get('/cart/add',[CartController::class, 'addCart']);
        Route::delete('/cart',[CartController::class, 'deleteCart']);

        Route::get('/buyer/purchase',[BuyerController::class,'showOrder']);
        Route::get('/buyer/purchase/detail/{order}',[BuyerController::class,'showOrderDetail']);
        Route::post('/buyer/buy',[BuyerController::class,'buyOrder']);
        Route::post('/buyer/cancel',[BuyerController::class,'cancelOrder']);

        Route::get('/seller/sold',[SellerController::class,'showOrder']);
        Route::get('/seller/sold/detail/{order}',[SellerController::class,'showOrderDetail']);
        Route::post('/seller/deliver',[SellerController::class,'deliver']);
        Route::post('/seller/cancel',[SellerController::class,'cancelOrder']);

        Route::get('/system/poster',[SystemController::class,'showPoster']);
        Route::post('/system/poster/update',[SystemController::class,'updatePoster']);
        Route::get('/system/poster/delete',[SystemController::class,'deletePoster']);
});
