<?php

use Blog\Domain\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => str_random(10),
            'username' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
