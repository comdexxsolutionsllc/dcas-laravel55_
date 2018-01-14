<?php

Route::get('/', function () {
    $user = (auth()->check()) ? auth()->user() : new \App\NullUser();

    return view('dashboard.admin.index')->with(compact('user'));
})->name('index')->middleware(['auth']);
