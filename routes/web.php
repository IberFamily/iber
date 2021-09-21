<?php

use TCG\Voyager\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Seller\OrderController;

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



Route::redirect('/','/home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add-to-cart{product}', [CartController::class, 'add'])->name('cart.add')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');

Route::get('/cart.destroy/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

Route::get('/cart.update/{itemId}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');

Route::get('/cart.checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');

Route::resource('orders', OrderController::class);

Route::resource('shops', ShopController::class)->middleware('auth');

Route::get('/success', [ShopController::class, 'index'])->name('success')->middleware('auth');



Route::group(['prefix' => 'admin'], function () {

    \Voyager::routes();

    Route::get('/order/pay/{suborder}', 'SubOrderController@pay')->name('order.pay');


});


Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller.', 'namespace' => 'Seller'], function () {

    Route::redirect('/','seller/orders');

    Route::resource('/orders',  OrderController::class);

    Route::get('/orders/delivered/{suborder}',  'OrderController::class@markDelivered');
});
