<?php

use Faker\Generator as Faker;

$factory->define(App\Website::class, function (Faker $faker) {
	$digits = 18;

	return [
		'personal_website' => $faker->url,
		'facebook_username' => $faker->userName,
		'github_username' => $faker->userName,
		'google_plus_username' => rand(pow(10, $digits-1), pow(10, $digits)-1) . '789',
		'pinterist_username' => $faker->userName,
		'twitter_username' => $faker->userName,
	];
});
