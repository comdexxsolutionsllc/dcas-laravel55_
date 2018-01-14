<?php

namespace DCAS\Observers;

use App\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param User $user
     */
    public function created(User $user): void
    {
    }
}
