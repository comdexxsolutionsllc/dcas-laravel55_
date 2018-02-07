<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class ResetPassword extends Command
{
    /**
     * @var string
     */
    protected $signature = 'user:reset {email}';

    /**
     * @var string
     */
    protected $description = "Reset a user's password";

    /**
     * User's email to disable.
     *
     * @var string
     */
    protected $email = '';


    /**
     * User object to disable.
     *
     * @var \App\User
     */
    protected $user;

    public function handle()
    {
        $this->email = $this->argument('email');
        $this->user = User::where(compact('email'))->first();

        $this->exitIfUserNotFound($this->getUser(), $this->getEmail());

        $this->resetPassword($this->getUser());
    }


    /**
     * Exit command if user is not found.
     *
     * @param \App\User $user
     * @param           $email
     */
    protected function exitIfUserNotFound(User $user, $email)
    {
        if (empty($user)) {
            $this->error("User '$email' not found");
        }

        return;
    }

    /**
     * Reset the given user's password.
     *
     * @param \App\User $user
     */
    protected function resetPassword(User $user)
    {
        if ($this->confirm('Let system generate password for you?')) {
            $password = str_random(16);
            $this->info("Your password: $password");
        } else {
            $password = $this->secret('Please enter your new password');
        }

        $user->password = bcrypt($password);

        $user->save();
    }

    /**
     * Get User's email.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get User object.
     *
     * @return \App\User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
