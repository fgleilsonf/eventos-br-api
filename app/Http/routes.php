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
    Route::get('events/{eventId}/medias', 'MediaController@byEventId');
    Route::post('events/{eventId}/like', 'LikesEventController@store');

    Route::post('medias/upload', 'MediaController@upload');

    Route::resource('comments', 'CommentController');
    Route::resource('events', 'EventController');
    Route::resource('medias', 'MediaController');
});