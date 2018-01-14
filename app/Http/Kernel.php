<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Laravel\Passport\Http\Middleware\CheckClientCredentials;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
        \Barryvdh\Cors\HandleCors::class,
        \anlutro\LaravelSettings\SaveMiddleware::class,
        \RenatoMarinho\LaravelPageSpeed\Middleware\InlineCss::class,
        \RenatoMarinho\LaravelPageSpeed\Middleware\ElideAttributes::class,
        \RenatoMarinho\LaravelPageSpeed\Middleware\InsertDNSPrefetch::class,
        \RenatoMarinho\LaravelPageSpeed\Middleware\RemoveComments::class,
        \RenatoMarinho\LaravelPageSpeed\Middleware\TrimUrls::class,
        \RenatoMarinho\LaravelPageSpeed\Middleware\RemoveQuotes::class,
        \RenatoMarinho\LaravelPageSpeed\Middleware\CollapseWhitespace::class,
        \App\Http\Middleware\CacheStatuses::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \App\Http\Middleware\GenerateMenus::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,
            \App\Http\Middleware\Ajaxify::class,
            //\Spatie\ResponseCache\Middlewares\CacheResponse::class,
            // \App\Http\Middleware\LogLastUserActivity::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'ability' => \Zizaco\Entrust\Middleware\EntrustAbility::class,
        'acceptJson' => \OpenCetacean\JsonHeader\Middleware\AcceptJson::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cacheResponse' => \Spatie\ResponseCache\Middlewares\CacheResponse::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'client' => CheckClientCredentials::class,
        'denyFrames' => \App\Http\Middleware\DenyFrames::class,
        'doNotCacheResponse' => \Spatie\ResponseCache\Middlewares\DoNotCacheResponse::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'jsonpResponse' => \App\Http\Middleware\JsonpResponse::class,
        //        'jwt.auth' => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
        //        'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,
        'link-header-pagination' => \Zono\LinkHeaderPagination\Middleware\LinkHeaderPagination::class,
        'permission' => \Zizaco\Entrust\Middleware\EntrustPermission::class,
        'restrict.ip.main' => \App\Http\Middleware\RestrictByIP::class,
        'role' => \Zizaco\Entrust\Middleware\EntrustRole::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'timeout' => \App\Http\Middleware\SessionTimeout::class,
    ];
}
