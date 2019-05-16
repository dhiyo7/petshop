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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('foods', 'Api\FoodController@index');
Route::get('food/{id}', 'Api\FoodController@show');
Route::post('food', 'Api\FoodController@store');
Route::post('food/{id}', 'Api\FoodController@update');
Route::delete('food/{id}', 'Api\FoodController@destroy');
