#!/usr/bin/env bash

touch config/modules.php
php artisan migrate --path=../vendor/venturecraft/revisionable/src/migrations
php artisan vendor:publish --provider="Tylercd100\LERN\LERNServiceProvider"
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
cp vendor/tylercd100/lern/migrations/* database/migrations
cp vendor/anlutro/l4-settings/src/config/config.php config/l4-settings.php
cp vendor/anlutro/l4-settings/src/migrations/2015_08_25_172600_create_settings_table.php database/migrations
php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider"
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=config
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets
php artisan vendor:publish --provider="EloquentFilter\ServiceProvider"
php artisan vendor:publish --tag=passport-components
php artisan vendor:publish --tag=passport-views
php artisan entrust:migration
php artisan dusk:install
php artisan passport:install


php artisan migrate
// end