<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
          $table->increments('id');
          $table->string('menu');
          $table->float('precio',10,2);
          $table->date('fecha');
          $table->string('imagen');
          $table->text('receta');
          $table->text('permanente')->comment('si - para la soda y cosas que siempre estaran');
          $table->integer('id_usuario');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
