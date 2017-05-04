<?php

namespace Blog\Service\Command;

use Chief\Command;

/**
 * Class RegisterUserCommand
 *
 * @package Blog\Service\Command
 */
class RegisterUserCommand implements Command
{
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $password;
}