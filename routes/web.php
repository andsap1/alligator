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

Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/{category}', 'ShopController@getCategory');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
