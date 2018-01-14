<?php

Route::view('/', 'welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('user.home');

Route::get('invoice/{invoice}', 'PdfController')->name('invoice');

// Dashboard profile.
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('profiles', 'ProfileController@index')->name('profiles');
    Route::get('profile/create', 'ProfileController@create')->name('profile.create');
    Route::post('profile', 'ProfileController@store')->name('profile.store');
    Route::get('/profile/{username}', 'ProfileController@show')->name('profile.{username}')->middleware(['auth']);
});
