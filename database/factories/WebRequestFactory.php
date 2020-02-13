<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\WebRequest::class, function (Faker $faker) {

    $response_type = \App\Models\ResponseType::inRandomOrder()->first();
    $country       = \App\Models\Country::inRandomOrder()->first();

    return [
        'response_type_id' => $response_type->id,
        'country_id'       => $country->id,
        'ip'               => $faker->ipv4,
        'response_time'    => $faker->randomNumber(3),
        'path'             => '/' . $faker->slug
    ];
});
