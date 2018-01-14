<?php

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// middleware:  'auth:api'
Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        abort(Symfony\Component\HttpFoundation\Response::HTTP_NOT_IMPLEMENTED, 'API version not implemented.');
    })->name('root');
});
