<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proveedor');
            $table->string('rubro');
            $table->string('entidad');
            $table->string('responsable');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('nit');
            $table->integer('id_usuario');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
