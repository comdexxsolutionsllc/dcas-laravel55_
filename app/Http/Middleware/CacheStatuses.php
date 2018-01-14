<?php

namespace App\Http\Middleware;

use Cache;
use Closure;
use Modules\SupportDesk\Models\Status;

class CacheStatuses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Cache::remember('statuses', 20, function () {
            return Status::pluck('hex', 'name');
        });

        return $next($request);
    }
}
