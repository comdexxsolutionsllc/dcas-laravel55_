<?php

use Faker\Generator as Faker;

$factory->define(\Modules\SupportDesk\Models\Status::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'hex' => $faker->safeHexColor
    ];
});
