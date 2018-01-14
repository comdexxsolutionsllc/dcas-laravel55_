<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $statuses = [
            'Open',
            'Assigned',
            'On Hold',
            'Pending Customer Response',
            'Awaiting Manager Review',
            'Closed'
        ];

        foreach (range(0, 5) as $index) {
            DB::table('statuses')->insert([
                'name' => $statuses[$index],
                'hex' => $faker->safeHexColor,
                'created_at' => Carbon::now()->subDay(1),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
