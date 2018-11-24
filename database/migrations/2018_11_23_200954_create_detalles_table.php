<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    public function up(){
        Schema::create('detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detalle');
            $table->string('precio');
            $table->string('cantidad');
            $table->dateTime('hora');
            $table->integer('id_pedido');
            $table->integer('id_menu');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('detalles');
    }
}
