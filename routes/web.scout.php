<?php

// API route for search.
Route::get('/find', 'SearchController@find')->name('find');
Route::redirect('/search', '/find')->name('search');
