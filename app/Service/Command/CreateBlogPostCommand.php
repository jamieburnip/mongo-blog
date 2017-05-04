<?php

namespace Blog\Service\Command;

use Blog\Domain\Models\User;
use Chief\Command;

/**
 * Class CreateBlogPostCommand
 *
 * @package Blog\Service\Command
 */
class CreateBlogPostCommand implements Command
{
    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    public $slug;

    /**
     * @var
     */
    public $body;

    /**
     * @var
     */
    public $published;

    /** @var User */
    private $user;

    /**
     * CreateBlogPostCommand constructor.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}