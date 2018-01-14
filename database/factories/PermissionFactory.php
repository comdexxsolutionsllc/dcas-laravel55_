<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'display_name' => $faker->sentence(),
        'description' => $faker->sentence()
    ];
});
