<?php

namespace Blog\Service\Command\Handlers;

use Blog\Domain\Models\User;
use Blog\Service\Command\RegisterUserCommand;

/**
 * Class RegisterUserCommandHandler
 *
 * @package Blog\Service\Command\Handlers
 */
class RegisterUserCommandHandler
{
    /**
     * @param RegisterUserCommand $command
     *
     * @return User
     */
    public function handle(RegisterUserCommand $command): User
    {
        return User::create([
            'name' => $command->name,
            'username' => $command->username,
            'email' => $command->email,
            'password' => $command->password,
        ]);

        // Could easily send a confirmation email here if required
    }
}