<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AdminMiddleware
{
    use WithoutMiddleware;

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
        $user = auth()->user();

        if (is_null($user) === true || !$user->isAdmin() || !$user->isSuperAdmin()) {
            return redirect('home')
                ->withCookie(
                    cookie('admin_middleware', '0', 1)
                );
        } else {
            return $next($request);
        }
    }
}
