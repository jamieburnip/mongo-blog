<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Models\User;
use Blog\Service\Command\RegisterUserCommand;

class RegisterUserCommandHandler
{
    public function handle(RegisterUserCommand $command)
    {
        User::create([
            'name' => $command->name,
            'username' => $command->username,
            'email' => $command->email,
            'password' => $command->password,
        ]);

        // Could easily send a confirmation email here if required
    }
}