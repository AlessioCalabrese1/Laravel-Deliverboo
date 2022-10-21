<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){
    Route::get('/restaurant', 'RestaurantController@index');
    Route::get('/restaurant/filter/{id}', 'RestaurantController@filter');
    Route::post('/storeOrder', 'OrderController@store');
    /** ATTENZIONE ALL'ORDINE DELLE ROTTE QUANDO ABBIAMO UN PARAMETRO, SE LA ROTTA NON è UNA SHOW METTERLA PRIMA */
    Route::get('/restaurant/{id}', 'RestaurantController@show');

    Route::get('/category', 'CategoryController@index');
});