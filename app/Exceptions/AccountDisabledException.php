<?php

namespace App\Exceptions;

use Log;
use Exception;
use Illuminate\Http\Response;

class AccountDisabledException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Your account has been disabled.';

    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\Response
     */
    public function render(): Response
    {
        return response()->view('errors.account-disabled', [], 500);
    }

    /**
     * @return bool
     */
    public function report(): bool
    {
        return Log::error($this->message);
    }
}
