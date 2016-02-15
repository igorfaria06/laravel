<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContaDespesasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_conta_despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dono_id')->unsigned();
            $table->foreign('dono_id')->references('id')->on('users');
            $table->integer('conta_id')->unsigned();
            $table->foreign('conta_id')->references('id')->on('user_banco_contas');
            $table->float('valor')->unsigned();
            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('user_conta_despesas');
    }

}
