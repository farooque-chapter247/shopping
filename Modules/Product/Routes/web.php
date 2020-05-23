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
            'prefix' => 'product' ,
            'middleware' => ['role:super-admin']
  
        
            ],function () {
            
                Route::get('/','ProductController@index')->name('product');
                Route::get('/list','ProductController@datatables')->name('product.list');
                Route::get('/add','ProductController@create')->name('product.add');
                Route::post('/add','ProductController@store')->name('product.add');
                Route::get('/edit/{product}','ProductController@edit')->name('product.edit');
                Route::post('/update/{product}','ProductController@update')->name('product.update');
                Route::get('/delete/{product}','ProductController@destroy')->name('product.delete');
                Route::post('/product-upload/{product}','ProductController@productUpload')->name('product.upload');
                Route::post('/temp-upload','ProductController@tempUpload')->name('temp.product.upload');
                
            });
        });
    
        
        
    });  