<?php

/*
    Authors: David Fonseca and Sergio Córdoba
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
Route::get('/communityposts', 'App\Http\Controllers\CommunityPostController@index')->name('communityposts.index');
Route::get('/communityposts/new', 'App\Http\Controllers\CommunityPostController@new')->name('communityposts.new');
Route::post('/communityposts/new/create', 'App\Http\Controllers\CommunityPostController@create')->name('communityposts.create');
Route::delete('/communityposts/{communitypost}', 'App\Http\Controllers\CommunityPostController@destroy')->name('communityposts.destroy');
Route::get('/communityposts/{id}', 'App\Http\Controllers\CommunityPostController@show')->name('communityposts.show');
Route::post('/communityposts/{id}/reviews', 'App\Http\Controllers\CommunityPostController@save')->name('communityposts.reviews.save');
Route::delete('/communityposts/reviews/{review}', 'App\Http\Controllers\CommunityPostController@delete')->name('communityposts.reviews.delete');

Route::middleware('auth')->group(function(){
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/my-account/orders', 'App\Http\Controllers\OrderController@orders')->name("myaccount.orders");
    Route::get('/order/{id}/pdf', 'App\Http\Controllers\OrderController@downloadPDF')->name('order.download');
});
