<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $helpers = [
        // Add your helpers in here
        \DCAS\Helpers\Arr::class,
    ];

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        foreach ($this->helpers as $helper) {
            $helperPath = app_path() . '/DCAS/Helpers/' . $helper . '.php';

            if (\File::isFile($helperPath)) {
                require_once $helperPath;
            }
        }
    }
}
