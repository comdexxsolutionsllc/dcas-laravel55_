<?php

namespace App\Providers;

use App\Profile;
use App\User;
use DCAS\Observers\ProfileObserver;
use DCAS\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Profile::observe(ProfileObserver::class);
        User::observe(UserObserver::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
