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
Route::middleware(['auth'])->group(function(){
    Route::group([
            'prefix' => 'admin' , 
            ],function () {	
            Route::group([
            'prefix' => 'order' ,
            'middleware' => ['role:super-admin']

        
            ],function () {
            
                Route::get('/','OrderController@index')->name('order');
                Route::get('/list','OrderController@datatables')->name('order.list');
                Route::get('/order-details/{order}', 'OrderController@orderDetail')->name('order.detail.user');
                Route::get('/order-status/{order}', 'OrderController@orderStatus')->name('order.status.change');
                Route::get('/delete/{order}','OrderController@destroy')->name('order.delete');
           
          
            });
        });
    
        
        
    });   