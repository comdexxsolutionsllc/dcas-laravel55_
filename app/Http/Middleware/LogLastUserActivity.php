<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class LogLastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $expiresAt = Carbon::now()->addMinutes(5);
            cache()->put('user-is-online-' . auth()->user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
