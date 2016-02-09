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

$factory->define(finLaravel\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'sexo' => $faker->word,
        'email' => $faker->email,
        'senha' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(finLaravel\Entities\Banco::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'pais' => $faker->country,
    ];
});

$factory->define(finLaravel\Entities\ContaBancaria::class, function (Faker\Generator $faker) {
    return [
        'dono_id' => rand(1, 10),
        'banco_id' => rand(1, 10),
        'conta' => $faker->word,
        'descricao' => $faker->sentence,
    ];
});
