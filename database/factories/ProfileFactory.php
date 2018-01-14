<?php

use App\User;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Profile::class, function (Faker $faker) {
    $user_id = User::pluck('id')->toArray();
    $username = User::where('id', $user_id)->pluck('username')[0];

    return [
        'user_id' => $faker->randomElement($user_id),
        'biography' => $faker->paragraph(),
        'address_1' => $faker->address,
        'city' => $faker->city,
        'state' => 'AB',
        'country' => $faker->countryCode,
        'postal_code' => $faker->postcode
    ];
});
