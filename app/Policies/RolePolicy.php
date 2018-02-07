<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Authorize all actions for the given model to Admins.
     *
     * @param \App\User $user
     * @param           $ability
     *
     * @return void
     */
    public function before($user, $ability)
    {
        //
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function view(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the role.
     *
     * @return mixed
     */
    public function update()
    {
        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @return mixed
     */
    public function delete()
    {
        return false;
    }
}
