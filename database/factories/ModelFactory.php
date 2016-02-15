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
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(finLaravel\Entities\Banco::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'pais' => $faker->country,
    ];
});

$factory->define(finLaravel\Entities\UserBancoConta::class, function (Faker\Generator $faker) {
    return [
        'dono_id' => rand(1, 10),
        'banco_id' => rand(1, 10),
        'conta' => $faker->word,
        'saldo' => $faker->numberBetween(),
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
    ];
});
$factory->define(finLaravel\Entities\UserContaDespesa::class, function (Faker\Generator $faker) {
    return [
        'dono_id' => rand(1, 3),
        'conta_id' => '8',
        'valor' => $faker->word,
        'nome' => $faker->name,
    ];
});

$factory->define(finLaravel\Entities\UserContaReceita::class, function (Faker\Generator $faker) {
    return [
        'dono_id' => rand(1, 3),
        'conta_id' => '8',
        'valor' => $faker->word,
        'nome' => $faker->name,
    ];
});