<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->firstName().' '.$faker->lastName,
        'username' => $faker->unique(1)->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'is_disabled' => 0,
        'domain' => $faker->domainName,
    ];
});

$factory->state(App\User::class, 'testing', function () {
    return [
        'name' => 'Sarah Renner',
        'email' => 'sarah@sarahrenner.work',
        'username' => 'srenner',
        'password' => bcrypt('secret'),
        'slug' => 'sarah-renner',
        'is_disabled' => 0,
        'domain' => null,
        'verified' => 1,
    ];
});

$factory->state(App\User::class, 'hasRememberToken', function () {
    return [
        'remember_token' => str_random(25),
    ];
});

$factory->state(App\User::class, 'isDisabled', function () {
    return [
        'is_disabled' => 1,
    ];
});

$factory->state(App\User::class, 'verified', function () {
    return [
        'verified' => 1,
    ];
});
