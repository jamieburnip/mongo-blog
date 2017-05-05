<?php

use Blog\Domain\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            for ($i = 1; $i <= 20; $i++) {
                $user->posts()->create([
                    'title' => str_random(10),
                    'slug' => str_random(10),
                    'body' => "<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>

                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                            
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            
                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                            
                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                            
                            <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                            
                            <p>Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
                            
                            <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>",
                    'published_at' => Carbon::now(),
                ]);
            }
        }
    }
}
