<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/about', 'AboutController@index');
Route::get('/shop1', 'ShopController@index')->name('shop1');
Route::get('/shop1/{category}', 'ShopController@getCategory');
Route::get('/item/{id}', 'ShopController@openPreke');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/view', 'ViewController@index')->name('view');
Route::get('/cart', 'CartController@index')->name('cart');

Route::get('/email', 'EmailController@index')->name('email');
Route::post('send','EmailController@send')->name('send');

Route::get('/view', 'ViewController@index');
Route::get('/cart', 'CartController@index');


Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/naudotojai', 'AdminController@naudotojai')->name('naudotojai');

