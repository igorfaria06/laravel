<?php

use Illuminate\Database\Seeder;

class UserContaReceitasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\finLaravel\Entities\UserContaReceita::class, 10)->create();
    }

}
