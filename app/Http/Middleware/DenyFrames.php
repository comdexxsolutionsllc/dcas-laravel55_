<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class DenyFrames
{
    public function handle(Request $request, \Closure $next)
    {
        return $next($request)->header('X-Frame-Options', 'DENY');
    }
}
