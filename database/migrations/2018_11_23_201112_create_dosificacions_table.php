<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosificacionsTable extends Migration
{

    public function up()
    {
        Schema::create('dosificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_factura')->unsigned();
            $table->integer('nit')->unsigned();
            $table->string('nro_autorizacion',18);
            $table->string('llave',100);
            $table->date('fecha_limite_emision');
            $table->string('titulo',50);
            $table->string('leyenda1',150);
            $table->string('leyenda2',150);
            $table->integer('id_user')->unsigned();
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
        Schema::dropIfExists('dosificacions');
    }
}
