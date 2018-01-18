<?php

namespace App\Providers;

use App\User;
use App\Profile;
use DCAS\Observers\UserObserver;
use DCAS\Observers\ProfileObserver;
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
