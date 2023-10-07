<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacaos', function (Blueprint $table) {
            $table->id();
            $table->Integer('pedido_id');
            $table->Integer('montade_pago');
            $table->Integer('saldo');
            $table->string('metodo_pagamento')->default('cash');
            $table->Integer('user_id');
            $table->date('data_transacao');
            $table->Integer('trasansao_montande');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacaos');
    }
};
