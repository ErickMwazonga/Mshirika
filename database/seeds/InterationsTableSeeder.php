<?php

use Illuminate\Database\Seeder;

class InterationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create()->each(function ($user){
            factory(App\Interaction::class, 1)->create(['user_id' => $user->id]);
        });

    }
}
