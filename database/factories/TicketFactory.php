<?php

use Carbon\Carbon;
use DCAS\Classes\TicketId;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Modules\SupportDesk\Models\Ticket::class, function (Faker $faker) {
	return [
		'user_id' => factory(App\User::class)->create()->id,
		'category_id' => factory(Modules\SupportDesk\Models\Category::class)->create()->id,
		'queue_id' => factory(Modules\SupportDesk\Models\Queue::class)->create()->id,
		'technician_id' => factory(Modules\SupportDesk\Models\Technician::class)->create()->id,
		'ticket_id' => TicketId::generate(),
		'title' => $faker->sentence(6),
		'priority' => $faker->randomElement($priorities = range(1, 10)),
		'status' => factory(Modules\SupportDesk\Models\Status::class)->create()->name,
		'message' => $faker->paragraph(5),
		'created_at' => Carbon::now()->subDay(2),
	];
});
