<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class OnlineUsersProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->getOnlineUsersCount();
    }

    /**
     * Get online user count.
     */
    private function getOnlineUsersCount()
    {
        view()->composer('partials.user-online', function ($view) {
            $onlineUsersCount = User::where('is_logged_in', 1)->count();

            $view->with(compact(['onlineUsersCount']));
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
