<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->states('testing')->create();

        $faker = Faker::create();
        foreach (range(1, 99) as $index) {
            $name = $faker->firstName() . ' ' . $faker->lastName;
            $username = $faker->userName;
            $slug = str_slug($name . '-' . $username);

            DB::table('accounts')->insert([
                'profile_id' => $index, // TODO:  Change this?
                'name' => $name,
                'username' => $username,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'is_disabled' => $faker->boolean(8.72),
                'domain' => $faker->domainName,
                'slug' => $slug,
                'created_at' => Carbon::now()->subDay(1),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
