<?php

use App\Profile;
use App\Website;
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
        {
            $admin = factory(App\User::class)->states('testing')->create();
            $profile = $admin->profile()->save(new Profile);
            $profile->websites()->save(new Website);
        }

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            $name = $faker->firstName() . ' ' . $faker->lastName;
            $username = $faker->userName;
            $slug = str_slug($name . '-' . $username);

            DB::table('accounts')->insert([
                'name' => $name,
                'username' => $username,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'is_disabled' => $faker->boolean(8.72),
                'verified' => ceil(rand(0, 1)),
                'domain' => $faker->domainName,
                'slug' => $slug,
                'created_at' => Carbon::now()->subDay(1),
                'updated_at' => Carbon::now(),
                'last_logged_in' => Carbon::now()->subDay(ceil(rand(1, 1000))),
            ]);

            DB::table('profiles')->insert([
                'user_id' => $index,
                'website_id' => $index,
                'avatar' => $faker->imageUrl(140, 140),
                'biography' => $faker->paragraph(),
                'address_1' => $faker->streetAddress,
                'address_2' => null,
                'city' => $faker->city,
                'state' => 'IL',
                'country' => $faker->countryCode,
                'postal_code' => '99999',
                'created_at' => Carbon::now()->subDay(1),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('websites')->insert([
                'profile_id' => $index,
                'personal_website' => $faker->url,
                'facebook_username' => $faker->userName,
                'github_username' => $faker->userName,
                'google_plus_username' => rand(pow(10, 17), pow(10, 18) - 1) . '789',
                'pinterest_username' => $faker->userName,
                'twitter_username' => $faker->userName,
            ]);
        }
    }
}
