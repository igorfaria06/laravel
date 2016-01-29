<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        //\cursoLaravel\Entities\Client::truncate();
        //\cursoLaravel\Entities\Projeto::truncate();
        $this->call(UserTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(ProjetoTableSeeder::class);
        $this->call(ProjetoNotasTableSeeder::class);

        Model::reguard();
    }

}
