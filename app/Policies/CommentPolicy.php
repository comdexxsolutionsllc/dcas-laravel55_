<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Supportdesk\Models\Comment;

class CommentPolicy
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
     * Determine whether the user can view the comment.
     *
     * @param \App\User $user
     * @param \App\Comment|Comment $comment
     *
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {
        return $user->may('view-comments');
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
        return $user->may('create-comments');
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param \App\User $user
     * @param \Modules\Supportdesk\Models\Comment $comment
     *
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $user->may('update-comments') && ($user->id === $comment->user_id);
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param \App\User $user
     * @param \Modules\Supportdesk\Models\Comment $comment
     *
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return false;
    }
}
