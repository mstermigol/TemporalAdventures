<?php

/*
    Authors: David Fonseca, Sergio Córdoba and Miguel Jaramillo
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::get('/travels', 'App\Http\Controllers\TravelController@index')->name('travel.index');
Route::get('/travels/{id}', 'App\Http\Controllers\TravelController@show')->name('travel.show');

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/my-account/orders', 'App\Http\Controllers\OrderController@orders')->name('myaccount.orders');
    Route::get('/order/{id}/pdf', 'App\Http\Controllers\OrderController@downloadPDF')->name('order.download');
});

Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
Route::get('/admin/users/create', 'App\Http\Controllers\Admin\AdminUserController@create')->name('admin.user.create');
Route::post('/admin/users/save', 'App\Http\Controllers\Admin\AdminUserController@save')->name('admin.user.save');
Route::delete('/admin/users/delete/{id}', 'App\Http\Controllers\Admin\AdminUserController@delete')->name('admin.user.delete');
Route::get('/admin/users/edit/{id}', 'App\Http\Controllers\Admin\AdminUserController@edit')->name('admin.user.edit');
Route::put('/admin/users/update/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.user.update');
Route::get('/admin/users/{id}', 'App\Http\Controllers\Admin\AdminUserController@show')->name('admin.user.show');
