<?php

// TODO: Remove. Debug only.
Route::get('/', function () {
    return ['path' => 'dashboard-user-index', 'debug' => true];
})->name('index');
