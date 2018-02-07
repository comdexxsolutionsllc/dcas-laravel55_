<?php

// TODO: Protect these routes with middleware to be only accessed by 'Super Admin' role.
Route::group(['as' => 'user.switch.'], function () {
    Route::get('user/switch/start/{id}', 'UserController@userSwitchStart')->name('start');
    Route::get('user/switch/stop', 'UserController@userSwitchStop')->name('stop');
});
