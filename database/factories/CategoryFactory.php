<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\Modules\SupportDesk\Models\Category::class, function (Faker $faker) {
	return [
		'name' => $faker->word,
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now(),
		'deleted_at' => null,
	];
});
