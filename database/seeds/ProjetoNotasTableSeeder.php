<?php

use Illuminate\Database\Seeder;

class ProjetoNotasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Apaga todos dados da tabela e cria dez registros
        
        factory(\cursoLaravel\Entities\ProjetoNotas::class, 50)->create();
    }

}
