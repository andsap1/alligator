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
Route::get('/', 'ShopController@indexHome')->name('home1');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index');
Route::get('/shop1', 'ShopController@index')->name('shop1');
Route::get('/shop1/{category}', 'ShopController@getCategory');
Route::get('/item/{id}', 'ShopController@openPreke');
Route::post('/item/{ids}', 'ShopController@insertPrekeVertinimas')->name('insertPrekeVertinimas');
Route::post('/komentaras/{id}', 'ShopController@insertPrekeKomentaras')->name('insertKomentaras');
Route::post('/item', 'ShopController@insertPrekeKrepselis')->name('insertPreke');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/{id}', 'CartController@deletePreke')->name('deletePreke');
Route::post('/cart/{id}/update', 'CartController@updatePreke')->name('updatePreke');
//shopo rikiavimas
Route::post('/shop1', 'ShopController@sort1')->name('sort1');
Route::post('/shop1/{cate}', 'ShopController@sort')->name('sort');
Route::get('email', 'EmailController@index')->name('email');
Route::post('/','EmailController@send')->name('send');
//paieska
Route::get('/paieska', 'SearchController@search')->name('search');


//TIK PRISIJUNGES USER
Route::group(['middleware' => 'auth'], function () {

    Route::get('/acc', 'AccController@index')->name('account');
    Route::post('/confirmEditAcc/{userId}', 'AccController@confirmEditAcc')->name('confirmEditAcc');
    Route::get('/order', 'OrderController@index');
    Route::post('/order','OrderController@insertOrder')->name('orderInsert');
    Route::get('/signout', 'AccController@signout');
    Route::get('/pay','PayController@index')->name('pay');
});

Auth::routes();

////ADMINAS
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::group(['as'=>'adminRoutes.','middleware' => 'auth:admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/signout', 'AdminController@signout')->name('admin.signout');
    Route::get('/users', 'AdminController@users')->name('users');
    Route::get('/product', 'AdminController@product')->name('product');
    Route::get('/orders', 'AdminController@orders')->name('orders');
    Route::get('/manageUser/{id}', 'AdminController@deleteUser')->name('deleteUser');
    Route::post('/manageUser', 'AdminController@insertUser')->name('manageUser');
    Route::get('/manageUser/useredit/{id}', 'AdminController@editUser')->name('useredit');
    Route::post('confirmEditedUser/{id}', 'AdminController@confirmEditedUser')->name('confirmEditedUser');
    Route::get('/manageProduct/{id}', 'AdminController@deleteProduct')->name('deleteProduct');
    Route::post('/manageProduct', 'AdminController@insertProduct')->name('manageProduct');
    Route::get('/manageProduct', 'AdminController@addProduct')->name('addProduct');
    Route::get('/manageProduct/productedit/{id}','AdminController@editProduct')->name('productedit');
    Route::post('confirmEditedProduct/{id}', 'AdminController@confirmEditedProduct')->name('confirmEditedProduct');
    Route::get('/manageOrder/{id}', 'AdminController@deleteOrders')->name('deleteOrder');
    Route::post('/manageOrder', 'AdminController@insertOrders')->name('manageOrders');
    Route::get('/manageOrder/orderedit/{id}','AdminController@editOrders')->name('orderedit');
    Route::post('confirmEditedOrder/{id}', 'AdminController@confirmEditedOrders')->name('confirmEditedOrders');
    Route::get('/manageCategory/{id}', 'AdminController@deleteCategory')->name('deleteCategory');
    Route::post('/manageCategory', 'AdminController@insertCategory')->name('manageCategory');
    Route::get('/manageCategory', 'AdminController@addCategory')->name('addCategory');
    //adminpaieska
    Route::get('/productsearch', 'SearchController@searchproduct')->name('searchproduct');
    Route::get('/ordersearch', 'SearchController@searchorders')->name('searchorder');

});





