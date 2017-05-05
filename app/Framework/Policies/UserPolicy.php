<?php

namespace Blog\Framework\Policies;

use Blog\Domain\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy
 *
 * @package Blog\Framework\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param User $profile
     *
     * @return bool
     * @internal param Post $post
     *
     */
    public function self(User $user, User $profile): bool
    {
        return $user->id === $profile->id;
    }
}
