<?php

namespace App\Policies;

use App\User;
use Modules\Supportdesk\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the comment.
     *
     * @param \App\User $user
     * @param Comment $comment
     *
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {
        if ($user->isSuperAdmin() || $user->isAdmin()) {
            return true;
        }

        return $user->may('view-comments') && ($user->id == $comment->user_id);
    }

    /**
     * Determine whether the user can create comments.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isSuperAdmin() || $user->isAdmin()) {
            return true;
        }

        return $user->may('create-comments');
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @return mixed
     */
    public function update()
    {
        return false;
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @return mixed
     */
    public function delete()
    {
        return false;
    }
}
