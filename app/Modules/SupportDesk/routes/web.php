<?php

Route::group(['module' => 'SupportDesk', 'prefix' => 'SupportDesk', 'middleware' => ['web'], 'namespace' => 'Modules\SupportDesk\Controllers', 'as' => 'supportdesk.'], function () {
    Route::post('comment', 'CommentsController@postComment')->name('comment.post');
    Route::get('my_tickets', 'TicketsController@userTickets')->name('my_tickets');
    Route::get('new_ticket', 'TicketsController@create')->name('new_ticket');
    Route::post('new_ticket', 'TicketsController@store')->name('new_ticket.post');
    Route::get('tickets/{ticket_id}', 'TicketsController@show')->name('tickets.{ticket_id}');

    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
        Route::get('tickets', 'TicketsController@index')->name('tickets');
        Route::get('closed_tickets', 'TicketsController@showClosed')->name('closed_tickets');
        Route::post('close_ticket/{ticket_id}', 'TicketsController@close')->name('close_ticket.{ticket_id}');
        Route::post('open_ticket/{ticket_id}', 'TicketsController@open')->name('open_ticket.{ticket_id}');

        Route::resource('permissions', 'PermissionsController');
        Route::resource('roles', 'RolesController');

//        Route::resource('categories', 'CategoryController');
        Route::resource('queues', 'QueueController');
        Route::resource('statues', 'StatusController');
        Route::resource('tags', 'TagController');
    });
    Route::resource('admin/categories', 'CategoryController');

});
