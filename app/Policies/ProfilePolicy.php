<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Authorize all actions for the given model to Admins.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function before($user): bool
    {
        if ($user->isSuperAdmin() || $user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @return mixed
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create profile.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->may('create-profile');
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param \App\User $user
     * @param \App\Profile $profile
     *
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->may('update-profile') || ($user->id === $profile->user_id);
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @return mixed
     */
    public function delete()
    {
        return false;
    }
}
