<?php

namespace App\Policies;

use App\User;
use Modules\Supportdesk\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the category.
     *
     * @return mixed
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @return mixed
     */
    public function create()
    {
        return false;
    }

    /**
     * Determine whether the user can update the category.
     *
     * @return mixed
     */
    public function update()
    {
        return false;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @return mixed
     */
    public function delete()
    {
        return false;
    }
}
