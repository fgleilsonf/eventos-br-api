<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */

Route::resource('users', 'UserController');
Route::post('users/{userId}/friendships', 'FriendshipController@store');
Route::get('users/{userId}/friendships', 'FriendshipController@listFriends');

Route::resource('routes', 'RouteController');

Route::get('/', function () {
    return view('welcome');
});