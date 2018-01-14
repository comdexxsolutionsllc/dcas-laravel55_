<?php

// TODO: Protect these routes with middleware to be only accessed by 'Super Admin' role.
Route::group(['as' => 'user.switch.'], function () {
    Route::get('user/switch/start/{id}', 'UserController@user_switch_start')->name('start.{id}');
    Route::get('user/switch/stop', 'UserController@user_switch_stop')->name('stop');
});
