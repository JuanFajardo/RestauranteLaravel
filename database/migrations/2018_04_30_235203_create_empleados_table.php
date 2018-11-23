<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('paterno');
          $table->string('materno');
          $table->string('ci');
          $table->string('telefono');
          $table->string('email');
          $table->string('direccion');
          $table->string('zona');
          $table->date('fecha_nacimiento');
          $table->integer('id_usuario');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
