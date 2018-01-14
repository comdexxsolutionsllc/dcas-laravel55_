<?php

use App\User;
use Carbon\Carbon;
use DCAS\Classes\TicketId;
use Faker\Generator as Faker;
use Modules\SupportDesk\Models\Category;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Modules\SupportDesk\Models\Ticket::class, function (Faker $faker) {
    $user_ids = User::pluck('id')->toArray();
    $category_ids = Category::pluck('id')->toArray();
    $priorities = range(1, 10);
    $statuses = [
        'Open',
        'Assigned',
        'On Hold',
        'Pending Customer Response',
        'Awaiting Manager Review',
        'Closed'
    ];

    return [
        'user_id' => $faker->randomElement($user_ids),
        'category_id' => $faker->randomElement($category_ids),
        'ticket_id' => TicketId::generate(),
        'title' => $faker->sentence(6),
        'priority' => $faker->randomElement($priorities),
        'message' => $faker->paragraph(5),
        'status' => $faker->randomElement($statuses),
        'created_at' => Carbon::now()->subDay(2)
    ];
});
