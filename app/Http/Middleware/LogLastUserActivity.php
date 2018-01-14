<?php

namespace App\Http\Middleware;

use App\User;
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
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);
            $user->is_logged_in = 1;
            $user->save();

            $expiresAt = Carbon::now()->addMinutes(5);
            cache()->put('user-is-online-' . auth()->user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
