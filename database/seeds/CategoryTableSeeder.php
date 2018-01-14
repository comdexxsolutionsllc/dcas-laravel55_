<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $categories = [
        'Backup',
        'Billing',
        'CDN',
        'Database',
        'Development',
        'Facilities',
        'Hardware',
        'Infrastructure',
        'Management',
        'Marketing',
        'Monitoring',
        'Networking',
        'Provisioning',
        'Sales',
        'Storage',
        'Technical Support',
        'Unassigned',
        'White Gloves'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $index => $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => Carbon::now()
            ]);

        }
    }
}
