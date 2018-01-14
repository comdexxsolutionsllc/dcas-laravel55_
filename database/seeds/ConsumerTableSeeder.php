<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ConsumerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('consumers')->insert([
                'id' => $index,
                'api_token' => str_random(60),
                'name' => $faker->sentence(3),
                'url' => $faker->url,
                'ip' => $faker->ipv4,
                'active' => $faker->boolean,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
