<?php

Route::prefix('v2')->group(function () {
    Route::get('/', function () {
        abort(Symfony\Component\HttpFoundation\Response::HTTP_NOT_IMPLEMENTED, 'API version not implemented.');
    })->name('root');
});
