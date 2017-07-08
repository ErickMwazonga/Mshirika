<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Institution::class, function(Faker\Generator $faker){
    return[
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'name' => $faker->company,
        'status' => $faker->randomElement(['Interested', 'Not Interested', 'In-Talks']),
        'cname' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'assignee' => $faker->name,
    ];
});

$factory->define(App\Interaction::class, function(Faker\Generator $faker){
    return[
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'institution_id' => function(){
            return factory('App\Institution')->create()->id;
        },
        'type' => $faker->randomElement(['Calls', 'Emails', 'Meetings']),
        'follow_up_items' => $faker->name,
    ];
});


$factory->define(App\Deal::class, function(Faker\Generator $faker){
    return[
        'interaction_id' => function(){
            return factory('App\Interaction')->create()->id;
        },
        'institution_ratio' => $faker->numberBetween(1,100),
        'company_ratio' => $faker->numberBetween(1,100),
    ];
});

