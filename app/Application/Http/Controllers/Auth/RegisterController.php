<?php

namespace Blog\Application\Http\Controllers\Auth;

use Blog\Application\Http\Controllers\Controller;
use Blog\Domain\Models\User;
use Blog\Service\Command\RegisterUserCommand;
use Chief\CommandBus;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

/**
 * Class RegisterController
 *
 * @package Blog\Application\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * @var RegisterUserCommand
     */
    private $registerUserCommand;

    /**
     * Create a new controller instance.
     *
     * @param CommandBus $chief
     * @param RegisterUserCommand $registerUserCommand
     */
    public function __construct(CommandBus $chief, RegisterUserCommand $registerUserCommand)
    {
        $this->middleware('guest');

        $this->registerUserCommand = $registerUserCommand;

        parent::__construct($chief);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|alpha|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data): User
    {
        $this->registerUserCommand->email = $data['email'];
        $this->registerUserCommand->name = $data['name'];
        $this->registerUserCommand->username = $data['username'];
        $this->registerUserCommand->password = bcrypt($data['password']);

        return $this->chief->execute($this->registerUserCommand);
    }
}
