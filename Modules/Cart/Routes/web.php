<?php

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

Route::prefix('cart')->group(function() {
    Route::get('/', 'CartController@index');
    Route::get('/add/{product}', 'CartController@add')->name('cart.add');
    Route::get('/detail', 'CartController@cartDetail')->name('cart.detail');
    Route::get('/update', 'CartController@update')->name('cart.update');
    Route::get('/remove', 'CartController@destroy')->name('cart.remove');
});
