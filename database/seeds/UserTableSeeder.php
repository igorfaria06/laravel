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


        factory(\finLaravel\Entities\User::class)->create([
            'nome' => 'igor',
            'sexo' => 'm',
            'email' => 'email@com.com',
            'password' => '123456',
            'remember_token' => str_random(10),
        ]);
        factory(\finLaravel\Entities\User::class, 10)->create();
    }

}
