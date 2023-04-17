<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Catalogue\Product;
use App\Http\Controllers\Sales\Order;
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

Route::get('/', [Product::class, 'index']);
Route::get('cart', [Product::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [Product::class, 'addToCart'])->name('add.to.cart');
Route::get('clear-cart', [Product::class, 'clearCart'])->name('clear.cart');

Route::get('/order', [Order::class, 'getCheckout'])->name('order.index');
Route::post('/order/save-order', [Order::class, 'saveOrder'])->name('save.order');
