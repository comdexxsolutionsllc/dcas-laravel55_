<?php

Route::group(['module' => 'SupportDesk', 'middleware' => ['web'], 'namespace' => 'App\Modules\SupportDesk\Controllers'], function() {

    Route::resource('SupportDesk', 'SupportDeskController');

});
