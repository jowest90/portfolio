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

$factory->define(App\Data::class, function (Faker $faker) {
  return [
      'email' => $faker->unique()->safeEmail,
      'activated'=> $faker->randomElement(['Active', 'Inactive']),
      'remember_token' => str_random(10),
  ];
});
