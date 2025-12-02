<?php

namespace App\Policies;

use App\Models\User;

use App\Models\Comment;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function reply(User $user, Comment $comment)
    {
        return is_null($comment->parent_id);
    }
}
