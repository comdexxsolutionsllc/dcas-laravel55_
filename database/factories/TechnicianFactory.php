<?php

use Faker\Generator as Faker;

$factory->define(\Modules\SupportDesk\Models\Technician::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->email
    ];
});
