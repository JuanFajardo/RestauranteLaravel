<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('inventario');
          $table->integer('cantidad');
          $table->string('lugar');
          $table->string('tipo')->comment('USO/BAJA');
          $table->date('fecha_uso')->nullable();
          $table->date('fecha_baja')->nullable();
          $table->text('observacion');
          $table->integer('id_usuario');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
