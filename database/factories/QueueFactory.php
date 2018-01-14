<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(\Modules\SupportDesk\Models\Queue::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'created_at' => Carbon::now()->subDay(1),
        'updated_at' => Carbon::now()
    ];
});
