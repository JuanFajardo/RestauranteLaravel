<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
  protected $table    = 'detalles';
  protected $fillable = [ 'id', 'detalle', 'precio', 'cantidad', 'hora', 'id_pedido', 'id_menu', 'id_user' ];
}
