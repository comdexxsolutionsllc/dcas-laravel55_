<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        if ($this->shouldReport($exception)) {
            //
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|SymphonyResponse
     */
    public function render($request, Exception $exception)
    {
        /*
         * Gracefully handles TokenMismatchExceptions
         * @source https://gist.github.com/jrmadsen67/bd0f9ad0ef1ed6bb594e
         */
        if ($exception instanceof TokenMismatchException) {
            return redirect()
                ->back()
                ->withInput($request->except('password', '_token'))
                ->withError('Validation Token has expired. Please try again');
        }

        if ($exception instanceof ModelNotFoundException) {
            if (request()->ajax() || request()->json()) {
                return response()->json([
                    'error' => [
                        'message' => 'Resource not found.',
                    ],
                ], SymphonyResponse::HTTP_NOT_FOUND);
            }
        }

        if ($exception instanceof TokenExpiredException) {
            return response()->json(['token_expired'], $exception->getStatusCode());
        } elseif ($exception instanceof TokenInvalidException) {
            return response()->json(['token_invalid'], $exception->getStatusCode());
        }

        return parent::render($request, $exception);
    }
}
