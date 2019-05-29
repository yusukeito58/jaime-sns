<?php

// User Regist
Route::post('/register', 'Auth\RegisterController@register')->name('register');
// User Update
Route::put('/update', 'UserController@update')->name('update');

// User Login
Route::post('/login', 'Auth\LoginController@login')->name('login');

// User Logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// logged user
Route::get('user', function () {
    return Auth::user();
})->name('user');

// Post Create
Route::post('/posts', 'PostController@create')->name('post.create');

// Post List
Route::get('posts', 'PostController@index')->name('post.index');
