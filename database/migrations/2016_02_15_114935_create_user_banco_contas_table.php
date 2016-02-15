<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBancoContasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('user_banco_contas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dono_id')->unsigned();
            $table->foreign('dono_id')->references('id')->on('users');
            $table->integer('banco_id')->unsigned();
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->integer('conta');
            $table->integer('nome');
            $table->float('saldo');
            $table->string('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
