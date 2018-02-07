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

        $slug = (string)$email . '-' . (string)$username;

        $this->confirm('Let system generate password for you?') ?
            $this->info("Your password: " . $password = str_random(16)) :
            $password = $this->secret('Please enter your new password');

        $password = bcrypt($password);

        $isDisabled = 0;

        $this->confirm('Does the user have a main domain?') ?
            $domain = $this->ask('What is the user\'s main domain?') :
            $domain = null;

        User::create(compact(['name', 'username', 'email', 'password', 'isDisabled', 'slug', 'domain']));
    }
}
