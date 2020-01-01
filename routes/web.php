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

/* code for admin panel*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login',function(){
	return view('admin.login_page');
});
Route::post('/admin/loginprocess','LoginController@loginProcess')->name('login_process');
Route::get('/admin/dashboard','admin\DashboardController@index')->name('admin.home');
Route::get('/admin/logout','admin\DashboardController@logout')->name('admin.logout');

//Code for Add/Edit/View Products
Route::get('/admin/productList','admin\ProductController@index')->name('admin.poducts.list');
Route::post('/admin/deleteProduct','admin\ProductController@delete')->name('admin.poducts.delete');
Route::post('/admin/deleteProduct','admin\ProductController@delete')->name('admin.poducts.delete');
Route::post('/admin/addProduct','admin\ProductController@add')->name('admin.poducts.add');
