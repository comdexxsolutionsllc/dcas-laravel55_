<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Lockout' => [
            'App\Listeners\UserEventSubscriber@onUserLockout',
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\UserEventSubscriber@onUserLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\UserEventSubscriber@onUserLogout',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();

        Event::listen('revisionable.*', function ($model, $revisions) {
            //dd($model, $revisions);
        });
    }
}
