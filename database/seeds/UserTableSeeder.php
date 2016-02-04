<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Apaga todos dados da tabela e cria dez registros

        factory(\cursoLaravel\Entities\User::class)->create(
        [
            'name' => 'igor',
            'email' => 'igor@com.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        factory(\cursoLaravel\Entities\User::class, 10)->create();
    }

}
