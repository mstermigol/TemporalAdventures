<?php

/*
    Authors: David Fonseca, Sergio Córdoba and Miguel Jaramillo
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::get('/travels', 'App\Http\Controllers\TravelController@index')->name('travel.index');
Route::get('/travels/random', 'App\Http\Controllers\TravelController@random')->name('travel.random');
Route::get('/travels/{id}', 'App\Http\Controllers\TravelController@show')->name('travel.show');

Route::get('/communityposts', 'App\Http\Controllers\CommunityPostController@index')->name('communitypost.index');
Route::get('/communityposts/new', 'App\Http\Controllers\CommunityPostController@create')->name('communitypost.create');
Route::get('/communityposts/{id}', 'App\Http\Controllers\CommunityPostController@show')->name('communitypost.show');

Route::middleware('auth')->group(function () {
    Route::post('/travels/{reviewOfId}/reviews', 'App\Http\Controllers\ReviewController@save')->name('travel.review.save');
    Route::delete('/travels/reviews/{review}', 'App\Http\Controllers\ReviewController@delete')->name('travel.review.delete');

    Route::get('/review/edit/{id}', 'App\Http\Controllers\ReviewController@edit')->name('review.edit');
    Route::put('/review/update/{id}', 'App\Http\Controllers\ReviewController@update')->name('review.update');

    Route::post('/communityposts/new/create', 'App\Http\Controllers\CommunityPostController@save')->name('communityposts.save');
    Route::delete('/communityposts/{communitypost}', 'App\Http\Controllers\CommunityPostController@delete')->name('communitypost.delete');
    Route::get('/communitypost/edit/{id}', 'App\Http\Controllers\CommunityPostController@edit')->name('communitypost.edit');
    Route::put('/communitypost/update/{id}', 'App\Http\Controllers\CommunityPostController@update')->name('communitypost.update');
    Route::post('/communityposts/{reviewOfId}/reviews', 'App\Http\Controllers\ReviewController@save')->name('communitypost.review.save');
    Route::delete('/communityposts/reviews/{review}', 'App\Http\Controllers\ReviewController@delete')->name('communitypost.review.delete');

    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::delete('/cart/delete-item/{id}', 'App\Http\Controllers\CartController@deleteItem')->name('cart.delete_item');

    Route::get('/my-account/orders', 'App\Http\Controllers\OrderController@orders')->name('myaccount.orders');
    Route::get('/order/{id}/pdf', 'App\Http\Controllers\OrderController@downloadPDF')->name('order.download');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
    Route::get('/admin/users/create', 'App\Http\Controllers\Admin\AdminUserController@create')->name('admin.user.create');
    Route::post('/admin/users/save', 'App\Http\Controllers\Admin\AdminUserController@save')->name('admin.user.save');
    Route::delete('/admin/users/delete/{id}', 'App\Http\Controllers\Admin\AdminUserController@delete')->name('admin.user.delete');
    Route::get('/admin/users/edit/{id}', 'App\Http\Controllers\Admin\AdminUserController@edit')->name('admin.user.edit');
    Route::put('/admin/users/update/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.user.update');
    Route::get('/admin/users/{id}', 'App\Http\Controllers\Admin\AdminUserController@show')->name('admin.user.show');

    Route::get('/admin/orders', 'App\Http\Controllers\Admin\AdminOrderController@index')->name('admin.order.index');
    Route::get('/admin/orders/{id}', 'App\Http\Controllers\Admin\AdminOrderController@show')->name('admin.order.show');
    Route::delete('/admin/orders/delete/{id}', 'App\Http\Controllers\Admin\AdminOrderController@delete')->name('admin.order.delete');

    Route::get('/admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name('admin.review.index');
    Route::get('/admin/reviews/create/travel', 'App\Http\Controllers\Admin\AdminReviewController@createTravel')->name('admin.review.createTravel');
    Route::get('/admin/reviews/create/community_post', 'App\Http\Controllers\Admin\AdminReviewController@createCommunityPost')->name('admin.review.createCommunityPost');
    Route::post('/admin/reviews/save', 'App\Http\Controllers\Admin\AdminReviewController@save')->name('admin.review.save');
    Route::delete('/admin/reviews/delete/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name('admin.review.delete');
    Route::get('/admin/reviews/edit/{id}', 'App\Http\Controllers\Admin\AdminReviewController@edit')->name('admin.review.edit');
    Route::put('/admin/reviews/update/{id}', 'App\Http\Controllers\Admin\AdminReviewController@update')->name('admin.review.update');
    Route::get('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@show')->name('admin.review.show');
});