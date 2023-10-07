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
        Schema::create('pedido_detalhes', function (Blueprint $table) {
            $table->id();
            $table->Integer('pedido_id');
            $table->Integer('produto_id');
            $table->Integer('quantidade');
            $table->Integer('preco_unitario');
            $table->Integer('montande');
            $table->Integer('desconto');
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
        Schema::dropIfExists('pedido_detalhes');
    }
};
