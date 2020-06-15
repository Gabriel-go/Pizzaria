<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelAdicionalItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicional_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade_adicional');
            $table->double('preco_adicional');
            $table->integer('id_pedido_item')->unsigned();
            $table->foreign('id_pedido_item')->references('id')->on('pedido_item')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('adicional_item');
    }
}
