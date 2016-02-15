<?php

use Illuminate\Database\Seeder;

class UserBancoContasTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\finLaravel\Entities\UserBancoConta::class, 10)->create();
    }

}
