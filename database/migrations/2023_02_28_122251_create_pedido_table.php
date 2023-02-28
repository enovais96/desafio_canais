<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_disco');
            $table->integer('quantidade_disco');
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('id_disco')->references('id_disco')->on('discos');
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
        Schema::dropIfExists('discos');
    }
}
