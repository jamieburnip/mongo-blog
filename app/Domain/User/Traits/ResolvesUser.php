<?php

namespace Blog\Domain\User\Traits;

use Blog\Domain\Models\User;

trait ResolvesUser
{
    /**
     * Return a user from their username
     *
     * @param string $username
     *
     * @return User
     */
    public function resolveUserFromUsername(string $username): User
    {
        return User::where('username', ltrim($username, '@'))->firstorfail();
    }
}