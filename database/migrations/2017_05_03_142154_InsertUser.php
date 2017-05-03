<?php

use Blog\Service\Command\RegisterUserCommand;
use Chief\Chief;
use Chief\CommandBus;
use Illuminate\Database\Migrations\Migration;

class InsertUser extends Migration
{
    public function __construct()
    {
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var CommandBus $chief */
        $chief = app()->make(CommandBus::class);

        $registerUserCommand = new RegisterUserCommand;
        $registerUserCommand->email = 'jamieburnip@gmail.com';
        $registerUserCommand->name = 'Jamie Burnip';
        $registerUserCommand->username = 'jamieburnip';
        $registerUserCommand->password = bcrypt('Password1');

        $chief->execute($registerUserCommand);
    }
}
