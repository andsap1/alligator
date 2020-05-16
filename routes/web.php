<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'ShopController@indexHome');

Route::get('/shop1', 'ShopController@index')->name('shop1');
Route::get('/shop1/{category}', 'ShopController@getCategory');
Route::get('/item/{id}', 'ShopController@openPreke');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
