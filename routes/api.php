<?php

// User Regist
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// User Login
Route::post('/login', 'Auth\LoginController@login')->name('login');

// User Logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
