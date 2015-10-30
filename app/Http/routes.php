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

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [ 'as' => 'listcategory', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/{id}', [ 'as' => 'category', 'uses' =>'AdminCategoriesController@show']);
        Route::get('/create', [ 'as' => 'addcategory', 'uses' => 'AdminCategoriesController@create']);
        Route::post('/create', [ 'as' => 'storecategory','uses' => 'AdminCategoriesController@store']);
        Route::get('/{id}/edit', [ 'as' => 'editcategory', 'uses' =>'AdminCategoriesController@edit']);
        Route::put('/{id}/update', [ 'as' => 'updatecategory', 'uses' =>'AdminCategoriesController@update']);
        Route::get('/{id}/destroy', [ 'as' => 'destroycategory','uses' => 'AdminCategoriesController@destroy']);
    });


    Route::group(['prefix' => 'products'], function(){
        Route::get('/', [ 'as' => 'listproduct', 'uses' => 'AdminProductsController@index']);
        Route::get('/{id}', [ 'as' => 'product', 'AdminProductsController@index']);
        Route::get('/create', [ 'as' => 'addproduct', 'uses' => 'AdminProductsController@create']);
        Route::post('/create', [ 'as' => 'storeproduct', 'uses' => 'AdminProductsController@store']);
        Route::get('/{id}/edit', [ 'as' => 'editproduct', 'uses' => 'AdminProductsController@edit']);
        Route::put('/{id}/update', [ 'as' => 'updateproduct', 'uses' => 'AdminProductsController@update']);
        Route::get('/{id}/destroy', [ 'as' => 'destroyproduct', 'uses' => 'AdminProductsController@destroy']);

        Route::group(['prefix' => 'images'], function(){
            Route::get('{id}',['as'=>'product.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}',['as'=>'product.image.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('create/{id}',['as'=>'product.image.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}',['as'=>'product.image.destroy', 'uses' => 'AdminProductsController@destroyImage']);
        });

    });


});