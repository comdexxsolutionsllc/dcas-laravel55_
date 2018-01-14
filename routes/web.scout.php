<?php

// API route for search.
Route::get('/find', 'SearchController@find')->name('find');
Route::get('/search', 'SearchController@find')->name('search');
