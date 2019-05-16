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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/admin', 'HomeController@index')->name('admin.dashboard');
Route::get('/admin/foods', 'FoodController@index')->name('admin.food');
Route::get('/admin/food/create', 'FoodController@create')->name('admin.food.create');
Route::post('/admin/food/store', 'FoodController@store')->name('admin.food.store');
Route::get('/admin/food/{id}/edit', 'FoodController@edit')->name('admin.food.edit');
Route::patch('/admin/food/{id}/update', 'FoodController@update')->name('admin.food.update');
Route::delete('/admin/food/{id}/destroy', 'FoodController@destroy')->name('admin.food.destroy');


Route::get('/admin/medicine', 'HomeController@medicine')->name('admin.medicine');
