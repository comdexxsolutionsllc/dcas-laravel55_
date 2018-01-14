<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class DisableUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:disable {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable a user';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where(compact('email'))->first();

        if (empty($user)) {
            $this->error("User '$email' not found");

            return;
        }

        if ($this->confirm('Are you sure you wish to disable this user?')) {
            $user->is_disabled = 1;
        } else {
            $this->info("User '$email' has not been disabled.");

            return;
        }

        $user->save();

        $this->info("User '$email' disabled.");
    }
}
