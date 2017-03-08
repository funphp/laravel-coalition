<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'Api'], function() {
    Route::post('/product', 'ProductController@save');
    Route::get('/product', 'ProductController@index');
    Route::get('/product/{id}', 'ProductController@edit');
    Route::post('/product/{id}', 'ProductController@update');
    Route::delete('/product/{id}', 'ProductController@delete');
});