<?php

use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
//
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'cors'], function () {
    Route::resource('users', 'UserController');
    Route::resource('events', 'EventController');
});