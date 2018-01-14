<?php

Route::view('/', 'welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('user.home');

Route::get('invoice/{invoice}', 'PdfController');

// Dashboard profile.
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('profiles', 'ProfileController@index');
    Route::get('profile/create', 'ProfileController@create');
    Route::post('profile', 'ProfileController@store');
    Route::get('/profile/{username}', 'ProfileController@show')->name('profile.{username}')->middleware(['auth']);
});
