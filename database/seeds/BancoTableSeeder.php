<?php

use Illuminate\Database\Seeder;

class BancoTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Apaga todos dados da tabela e cria dez registros

        factory(\finLaravel\Entities\Banco::class, 10)->create();
    }

}
