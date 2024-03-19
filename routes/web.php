<?php

/*
    Authors: David Fonseca and Sergio Córdoba
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/travels', 'App\Http\Controllers\TravelController@index')->name('travel.index');
Route::get('/travels/{id}', 'App\Http\Controllers\TravelController@show')->name('travel.show');
Route::get('/communityposts', 'App\Http\Controllers\CommunityPostController@index')->name('communitypost.index');
Route::get('/communityposts/new', 'App\Http\Controllers\CommunityPostController@create')->name('communitypost.create');
Route::get('/communityposts/{id}', 'App\Http\Controllers\CommunityPostController@show')->name('communitypost.show');

Route::middleware('auth')->group(function(){
    Route::post('/travels/{id}/reviews', 'App\Http\Controllers\ReviewController@save')->name('travel.reviews.save');
    Route::delete('/travels/reviews/{review}', 'App\Http\Controllers\ReviewController@delete')->name('travel.reviews.delete');
    Route::post('/communityposts/new/create', 'App\Http\Controllers\CommunityPostController@save')->name('communityposts.save');
    Route::delete('/communityposts/{communitypost}', 'App\Http\Controllers\CommunityPostController@delete')->name('communitypost.delete');
    Route::post('/communityposts/{id}/reviews', 'App\Http\Controllers\ReviewController@save')->name('communitypost.reviews.save');
    Route::delete('/communityposts/reviews/{review}', 'App\Http\Controllers\ReviewController@delete')->name('communitypost.reviews.delete');
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/my-account/orders', 'App\Http\Controllers\OrderController@orders')->name("myaccount.orders");
    Route::get('/order/{id}/pdf', 'App\Http\Controllers\OrderController@downloadPDF')->name('order.download');
});
