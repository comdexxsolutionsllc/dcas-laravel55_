<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @var array
     */
    private $tables = [
        'accounts',
        'categories',
        'comments',
        'consumers',
        'permissions',
        'profiles',
        'queues',
        'requestors',
        'roles',
        'statuses',
        'technicians',
        'tickets',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        Eloquent::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(ConsumerTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(QueueTableSeeder::class);
        $this->call(RequestorTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(TechnicianTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }

    private function cleanDatabase()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");

        foreach ($this->tables as $tableName) {
            DB::table($tableName)->truncate();
        }

        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }
}
