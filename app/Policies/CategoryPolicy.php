<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Supportdesk\Models\Category;

class CategoryPolicy
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
        if ($user->isAdmin()) return true;
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param \App\User $user
     * @param \Modules\Supportdesk\Models\Category $category
     *
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param \App\User $user
     * @param \Modules\Supportdesk\Models\Category $category
     *
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param \App\User $user
     * @param \Modules\Supportdesk\Models\Category $category
     *
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return false;
    }
}
