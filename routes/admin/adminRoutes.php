<?php

/*
    Author: Miguel Jaramillo
*/

use Illuminate\Support\Facades\Route;

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

    Route::get('/admin/communityposts', 'App\Http\Controllers\Admin\AdminCommunityPostController@index')->name('admin.communitypost.index');
    Route::get('/admin/communityposts/create', 'App\Http\Controllers\Admin\AdminCommunityPostController@create')->name('admin.communitypost.create');
    Route::post('/admin/communityposts/save', 'App\Http\Controllers\Admin\AdminCommunityPostController@save')->name('admin.communitypost.save');
    Route::delete('/admin/communityposts/delete/{id}', 'App\Http\Controllers\Admin\AdminCommunityPostController@delete')->name('admin.communitypost.delete');
    Route::get('/admin/communityposts/edit/{id}', 'App\Http\Controllers\Admin\AdminCommunityPostController@edit')->name('admin.communitypost.edit');
    Route::put('/admin/communityposts/update/{id}', 'App\Http\Controllers\Admin\AdminCommunityPostController@update')->name('admin.communitypost.update');
    Route::get('/admin/communityposts/{id}', 'App\Http\Controllers\Admin\AdminCommunityPostController@show')->name('admin.communitypost.show');

    Route::get('/admin/travels', 'App\Http\Controllers\Admin\AdminTravelController@index')->name('admin.travel.index');
    Route::get('/admin/travels/create', 'App\Http\Controllers\Admin\AdminTravelController@create')->name('admin.travel.create');
    Route::post('/admin/travels/save', 'App\Http\Controllers\Admin\AdminTravelController@save')->name('admin.travel.save');
    Route::delete('/admin/travels/delete/{id}', 'App\Http\Controllers\Admin\AdminTravelController@delete')->name('admin.travel.delete');
    Route::get('/admin/travels/edit/{id}', 'App\Http\Controllers\Admin\AdminTravelController@edit')->name('admin.travel.edit');
    Route::put('/admin/travels/update/{id}', 'App\Http\Controllers\Admin\AdminTravelController@update')->name('admin.travel.update');
    Route::get('/admin/travels/{id}', 'App\Http\Controllers\Admin\AdminTravelController@show')->name('admin.travel.show');

    Route::get('/admin/locale/{lange}', 'App\Http\Controllers\LangController@setLang')->name('lang.setLang');
});
