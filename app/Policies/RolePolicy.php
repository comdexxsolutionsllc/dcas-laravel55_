<?php

namespace App\Policies;

use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Authorize all actions for the given model to Admins.
     *
     * @param \App\User $user
     * @param $ability
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
     * @param \App\Role $role
     *
     * @return mixed
     */
    public function view(User $user, Role $role)
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
     * @param \App\User $user
     * @param \App\Role $role
     *
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param \App\User $user
     * @param \App\Role $role
     *
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return false;
    }
}
