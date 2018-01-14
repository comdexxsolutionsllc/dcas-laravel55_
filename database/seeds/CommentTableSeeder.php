<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Modules\SupportDesk\Models\Ticket;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $tickets_ids = Ticket::pluck('id')->toArray();
        $user_ids = Ticket::pluck('user_id')->toArray();

        foreach (range(1, rand(100, 1000)) as $index) {
            DB::table('comments')->insert([
                'ticket_id' => $faker->randomElement($tickets_ids),
                'user_id' => $faker->randomElement($user_ids),
                'comment' => $faker->paragraph(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
