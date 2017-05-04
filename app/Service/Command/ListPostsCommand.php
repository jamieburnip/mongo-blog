<?php

namespace Blog\Service\Command;

use Blog\Domain\Models\User;
use Chief\Command;

/**
 * Class ListPostCommand
 *
 * @package Blog\Service\Command
 */
class ListPostsCommand implements Command
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var int|null
     */
    private $pages;

    /**
     * ListPostCommand constructor.
     *
     * @param User $user
     * @param int|null $pages
     */
    public function __construct(User $user, ?int $pages = 15)
    {
        $this->user = $user;
        $this->pages = $pages;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return int|null
     */
    public function getPages(): ?int
    {
        return $this->pages;
    }
}