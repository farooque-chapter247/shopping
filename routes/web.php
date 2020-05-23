<?php

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

Route::get('/', 'HomeController@index')->name('front');



Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::match(['get', 'post'], '/dashboard', 'DashBoardController@index')->name('dashboard');
    Route::prefix('order')->group(function() {
        Route::get('/myorder', 'OrderController@index')->name('order.myorder');
        Route::Post('/payOrder', 'OrderController@orderPay')->name('order.pay');
        Route::get('/pay', 'OrderController@pay')->name('order.pay.frontend');
        Route::Post('/saveaddress', 'OrderController@saveAddress')->name('order.save.adrress');
        Route::get('/order-details/{order}', 'OrderController@orderDetail')->name('front.order.detail');
        Route::get('/order-details-print/{order}', 'OrderController@orderDetailPrint')->name('front.order.detail.print');
    });
});


Route::redirect('/home', '/')->name('home');
// Route::get('/home', 'HomeController@home')->name('home');


Route::get('/product-detail/{product}', 'ProductController@show')->name('front.product.detail');
Route::get('/product-list/{category}', 'ProductController@list')->name('front.product.list');


