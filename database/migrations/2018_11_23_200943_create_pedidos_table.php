<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration{

    public function up(){
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('ci');
            $table->string('tipo');
            $table->date('fecha');
            $table->dateTime('hora');
            $table->string('mesa');
            $table->string('estado')->commet('pedido/preparar/servir/pagado/facturado');
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
