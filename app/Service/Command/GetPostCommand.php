<?php

namespace Blog\Service\Command;

use Blog\Domain\Models\User;
use Chief\Command;

/**
 * Class GetPostCommand
 *
 * @package Blog\Service\Command
 */
class GetPostCommand implements Command
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $slug;

    /**
     * GetPostCommand constructor.
     *
     * @param User $user
     * @param string $slug
     */
    public function __construct(User $user, string $slug)
    {
        $this->user = $user;
        $this->slug = $slug;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}