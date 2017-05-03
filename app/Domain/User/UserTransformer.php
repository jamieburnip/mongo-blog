<?php

namespace Blog\Domain\User;

use Blog\Domain\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 *
 * @package Blog\Domain\User
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            'name' => $user->name,
            'username' => $user->username,
            'avatar' => $user->getAvatar(),
            'created_at' => $user->created_at,
            'created_at_human' => $user->created_at->diffForHumans(),
        ];
    }
}