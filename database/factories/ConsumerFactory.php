<?php

use Faker\Generator as Faker;

$factory->define(\App\Consumer::class, function (Faker $faker) {
    return [
        'api_token' => str_random(60),
        'name' => $faker->sentence(3),
        'url' => $faker->url,
        'ip' => $faker->ipv4,
        'active' => $faker->boolean,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
