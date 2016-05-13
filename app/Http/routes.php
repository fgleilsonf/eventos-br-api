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

    Route::get('events/{eventId}/comments', 'CommentController@byEventId');
    Route::post('events/{eventId}/like', 'LikesEventController@store');

    Route::resource('events', 'EventController');
    Route::resource('comments', 'CommentController');
});