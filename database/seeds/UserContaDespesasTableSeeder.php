<?php

use Illuminate\Database\Seeder;

class UserContaDespesasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\finLaravel\Entities\UserContaDespesa::class, 10)->create();
    }

}
