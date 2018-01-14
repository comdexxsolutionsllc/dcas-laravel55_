<?php

use App\User;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

if (in_array(app()->environment(), $env = ['development', 'local'])) {
    Route::get('decompose', '\Lubusin\Decomposer\Controllers\DecomposerController@index')->name('decompose');

    Route::get('/sms/{user_id}', function ($user_id) {
        try {
            \Authy::getProvider()->sendSmsToken($user = User::find($user_id));
        } catch (Exception $e) {
            app(ExceptionHandler::class)->report($e);

            return response()->json(['error' => ['Unable To Send 2FA Login Token']], 422);
        }
    })->name('sms.{user_id}');

    Route::get('sort', function () {
        return $users = App\User::sortable()->limit(5)->paginate();
    });
}
