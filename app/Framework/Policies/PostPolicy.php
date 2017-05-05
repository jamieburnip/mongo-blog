<?php

namespace Blog\Framework\Policies;

use Blog\Domain\Models\Post;
use Blog\Domain\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class PostPolicy
 *
 * @package Blog\Framework\Policies
 */
class PostPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Post $post
     *
     * @return bool
     */
    public function owns(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * @param User $user
     * @param Post $post
     *
     * @return bool
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * @param User $user
     * @param Post $post
     *
     * @return bool
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * @param User $user
     * @param Post $post
     *
     * @return bool
     */
    public function draft(User $user, Post $post): bool
    {
        if($post->isPublished()){
            return true;
        }

        return $user->id === $post->user_id;
    }
}
