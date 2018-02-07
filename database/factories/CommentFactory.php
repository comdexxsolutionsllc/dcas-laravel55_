<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Modules\SupportDesk\Models\Comment::class, function (Faker $faker) {
	return [
		'ticket_id' => factory(Modules\SupportDesk\Models\Ticket::class)->create()->id,
		'user_id' => factory(App\User::class)->create()->id,
		'comment' => $faker->paragraph,
	];
});
