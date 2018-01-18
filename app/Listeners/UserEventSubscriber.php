<?php

namespace App\Listeners;

use Log;
use Cache;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Lockout;

class UserEventSubscriber
{
    /**
     * Handle user lockout events.
     *
     * @param Lockout $event
     */
    public function onUserLockout(Lockout $event)
    {
        $this->logLockout($event);
    }

    /**
     * Handle user login events.
     */
    public function onUserLogin()
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;

            Cache::put('user-is-online-'.$userId, true, $expiresAt = Carbon::now()->addMinutes(5));

            $user = User::find($userId);

            $user->is_logged_in = 1;

            $user->save();
        }
    }

    /**
     * Handle user logout events.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function onUserLogout()
    {
        $userId = auth()->user()->id;

        Cache::delete('user-is-online-'.$userId);

        $user = User::find($userId);

        $user->is_logged_in = 0;

        $user->save();
    }

    /**
     * @param Lockout $event
     */
    protected function logLockout(Lockout $event)
    {
        Log::notice($message = $event->request->username.' has been locked out at '.Carbon::now());
    }
}
