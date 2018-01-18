<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class Ajaxify
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
        // Get the original response
        $response = $next($request);

        if (! $this->shouldAjaxify($request, $response)) {
            return $response;
        }

        // A 20* response
        if ($response->isSuccessful()) {
            $originalContent = $response->getOriginalContent();
            // Get the data we passed to our view
            $data = $originalContent->getData();
            // Return the data passed to view as JSON response
            return response()->json($data);
        }

        // We don't have a successful response,
        //  we rather have a redirect like response

        $flashData = $this->getFlashData($request);
        if (! count($flashData)) {
            return $response;
        }
        // Return all the flash data as JSON
        return response()->json($flashData, $response->getStatusCode());
    }

    /**
     * @param $request
     * @param $response
     *
     * @return bool
     */
    protected function shouldAjaxify($request, $response): bool
    {
        // If we already have a JSON response we don't need to do anything
        if ($response instanceof JsonResponse) {
            return false;
        }

        // If there is a server (status 50*) error, we won't do anything
        if ($response->isServerError()) {
            return false;
        }

        // It's not a View response
        if ($response->isSuccessful() && ! method_exists($response->getOriginalContent(), 'getData')) {
            return false;
        }

        // Now if it's an Ajax request or the clients wants a JSON response or we've
        //  a query string param 'ajaxify' then we'll Ajaxify, else we won't.
        return $request->ajax() || $request->wantsJson() || $request->exists('ajaxify');
    }

    /**
     * @param $request
     *
     * @return static|\Illuminate\Support\Collection
     */
    protected function getFlashData($request)
    {
        // Get all session data and convert the array to a Collection object
        $sessionData = collect($request->session()->all());
        // Filter only flash data from session data
        $flashedKeys = $request->session()->get('flash.new');
        $flashData = $sessionData->only($flashedKeys);

        // Delete flash data, as we've already used them
        $request->session()->forget($flashedKeys);

        return $flashData;
    }
}
