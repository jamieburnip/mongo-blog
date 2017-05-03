<?php

namespace Blog\Service\Command;

use Chief\Command;

class RegisterUserCommand implements Command
{
    public $email;
    public $name;
    public $username;
    public $password;
}