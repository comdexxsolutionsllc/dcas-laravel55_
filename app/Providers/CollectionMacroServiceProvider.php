<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        Collection::macro('addIfNotNull', function ($element) {
            $collection = collect($this->items);
            if ($element != null) {
                $collection = $collection->push($element);
            }

            return $collection;
        });
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
    }
}
