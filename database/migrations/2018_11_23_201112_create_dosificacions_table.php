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
            $tabla->integer('numero_factura')->unsigned();
            $tabla->integer('nit')->unsigned();
            $tabla->string('nro_autorizacion',18);
            $tabla->string('llave',100);
            $tabla->date('fecha_limite_emision');
            $tabla->string('titulo',50);
            $tabla->string('leyenda1',150);
            $tabla->string('leyenda2',150);
            $tabla->integer('id_user')->unsigned();
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
