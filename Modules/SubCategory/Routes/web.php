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
            'prefix' => 'subcategory' ,
            'middleware' => ['role:super-admin']
   
        
            ],function () {
                Route::get('/add/{category}','SubCategoryController@create')->name('subcategory.create');
                Route::post('/add','SubCategoryController@store')->name('subcategory.add');
                Route::post('/subcategory-fetch','SubCategoryController@subCategoryFetch')->name('subcategory.fetch');
                Route::get('/{category}','SubCategoryController@index')->name('subcategory');
                Route::get('/list/{category}','SubCategoryController@datatables')->name('subcategory.list');

             
                Route::get('/edit/{subcategory}','SubCategoryController@edit')->name('subcategory.edit');
                Route::post('/update/{subcategory}','SubCategoryController@update')->name('subcategory.update');
                Route::get('/delete/{subcategory}','SubCategoryController@destroy')->name('subcategory.delete');
                Route::post('/subcategory-upload/{subcategory}','SubCategoryController@subcategoryUpload')->name('subcategory.upload');
            });
        });
    
        
        
    });   