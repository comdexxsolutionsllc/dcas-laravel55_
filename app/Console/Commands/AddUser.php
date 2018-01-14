<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddUser extends Command
{
    /**
     * @var string
     */
    protected $signature = 'user:add {email}';

    /**
     * @var string
     */
    protected $description = 'Creates a new user';

    public function handle()
    {
        $name = $this->ask('What is the user\'s name?');

        $username = $this->ask('What is the user\'s username?');

        $email = $this->argument('email');

        $slug = $email . '-' . $username;

        if ($this->confirm('Let system generate password for you?')) {
            $password = str_random(16);
            $this->info("Your password: $password");
        } else {
            $password = $this->secret('Please enter your new password');
        }
        $password = bcrypt($password);

        $is_admin = $this->ask('Is the user an admin? [yes=1 or no=0]');

        $is_disabled = 0;

        if ($this->confirm('Does the user have a main domain?')) {
            $domain = $this->ask('What is the user\'s main domain?');
        } else {
            $domain = null;
        }

        User::create(compact(['name', 'username', 'email', 'password', 'is_admin', 'is_disabled', 'slug', 'domain']));
    }
}
