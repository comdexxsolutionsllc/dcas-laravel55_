<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Profile::class, function (Faker $faker) {
	return [
		'biography' => $faker->paragraph(),
		'address_1' => $faker->address,
		'city' => $faker->city,
		'state' => 'AB',
		'country' => $faker->countryCode,
		'postal_code' => '00000',
	];
});
