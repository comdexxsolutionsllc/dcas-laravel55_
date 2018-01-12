<?php

Route::group(['module' => 'SupportDesk', 'middleware' => ['api'], 'namespace' => 'App\Modules\SupportDesk\Controllers'], function() {

    Route::resource('SupportDesk', 'SupportDeskController');

});
