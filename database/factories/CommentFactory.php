<?php

use App\User;
use Faker\Generator as Faker;
use Modules\SupportDesk\Models\Ticket;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Modules\SupportDesk\Models\Comment::class, function (Faker $faker) {
    $ticket_ids = Ticket::pluck('id')->toArray();
    $user_ids = User::pluck('id')->toArray();

    return [
        'ticket_id' => $faker->randomElement($ticket_ids),
        'user_id' => $faker->randomElement($user_ids),
        'comment' => $faker->paragraph
    ];
});
