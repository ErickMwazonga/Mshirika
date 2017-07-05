<?php

use Illuminate\Database\Seeder;

class InstitutionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create()->each(function ($user){
            factory(App\Institution::class, 2)->create(['user_id' => $user->id]);
        });

    }
}
