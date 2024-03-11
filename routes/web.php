<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/travels', 'App\Http\Controllers\TravelController@index')->name("travel.index");
Route::get('/travels/{id}', 'App\Http\Controllers\TravelController@show')->name("travel.show");
