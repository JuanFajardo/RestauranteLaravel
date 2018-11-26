<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('numero_factura')->unsigned();
          $table->string('nombre');
          $table->integer('nit')->unsigned();
          $table->date('fecha');
          $table->float('cantidad', 10,2);
          $table->float('total', 10,2);

          $table->string('numero_autorizacion');
          $table->string('codigo_control');

          $table->integer('id_usuario')->unsigned();
          $table->integer('id_dosificacion')->unsigned();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
