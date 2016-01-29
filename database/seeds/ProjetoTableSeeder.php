<?php

use Illuminate\Database\Seeder;

class ProjetoTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Apaga todos dados da tabela e cria dez registros
        
        factory(\cursoLaravel\Entities\Projeto::class, 10)->create();
    }

}
