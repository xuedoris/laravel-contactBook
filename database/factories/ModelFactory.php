<?php
use DB;
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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'contactname' => $faker->name,
        'phonenumber' => rand(1111111111,9999999999),
        'phonetype_id' => DB::table('phonetype')->get()->random()->id,
        'email' => $faker->safeEmail,
        'user_id' => App\User::all()->random()->id,
        'bday' => Carbon\Carbon::createFromDate(rand(1920, 2016), 2, 8),
    ];
});
