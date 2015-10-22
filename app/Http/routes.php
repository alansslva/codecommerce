<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/admin/categories', 'AdminCategoriesController@index');
//Route::get('/admin/products', 'AdminProductsController@index');

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [ 'as' => 'listcategory', 'AdminCategoriesController@index']);
        Route::get('/{id}', [ 'as' => 'category', 'AdminCategoriesController@category']);
        Route::post('/create', [ 'as' => 'addcategory', 'AdminCategoriesController@store']);
        Route::put('/{id}/edit', [ 'as' => 'editcategory', 'AdminCategoriesController@update']);
        Route::get('/{id}/destroy', [ 'as' => 'destroycategory', 'AdminCategoriesController@destroy']);
    });


    Route::group(['prefix' => 'products'], function(){
        Route::get('/', [ 'as' => 'listproduct', 'AdminProductsController@index']);
        Route::get('/{id}', [ 'as' => 'product', 'AdminProductsController@product']);
        Route::post('/create', [ 'as' => 'addproduct', 'AdminProductsController@store']);
        Route::put('/{id}/edit', [ 'as' => 'editproduct', 'AdminProductsController@edit']);
        Route::get('/{id}/destroy', [ 'as' => 'destroyproduct', 'AdminProductsController@destroy']);
    });
});