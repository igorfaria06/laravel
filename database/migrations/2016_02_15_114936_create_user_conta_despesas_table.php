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
            $table->string('nome');
            $table->float('valor');
            $table->integer('status');
            $table->dateTime('data_pagamento');
            $table->datetime('data_vencimento');
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
        Schema::drop('user_conta_despesas');
    }

}
