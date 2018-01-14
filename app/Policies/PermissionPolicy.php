<?php

namespace App\Policies;

use App\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     *
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        return $user->may('view-permissions');
    }

    /**
     * Determine whether the user can create permissions.
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
     * Determine whether the user can update the permission.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     *
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     *
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        return false;
    }
}
