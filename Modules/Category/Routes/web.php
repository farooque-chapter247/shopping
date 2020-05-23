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
        'prefix' => 'category' ,
        'middleware' => ['role:super-admin']
     
    
        ],function () {
        
            Route::get('/','CategoryController@index')->name('category');
            Route::get('/list','CategoryController@datatables')->name('category.list');
            Route::get('/add','CategoryController@create')->name('category.add');
            Route::post('/add','CategoryController@store')->name('category.add');
            Route::get('/edit/{category}','CategoryController@edit')->name('category.edit');
            Route::post('/update/{category}','CategoryController@update')->name('category.update');
            Route::get('/delete/{category}','CategoryController@destroy')->name('category.delete');
            Route::post('/category-upload/{category}','CategoryController@categoryUpload')->name('category.upload');
      
        });
    });

    
    
});   