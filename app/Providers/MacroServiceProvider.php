<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    public $foreignKey = 'user_id';

    /**
     * @var string
     */
    public $localKey = 'id';

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        HasMany::macro('toHasOne', function () {
            return new HasOne(
                $this->getQuery(),
                $this->getParent(),
                $this->foreignKey,
                $this->localKey
            );
        });
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
    }
}
