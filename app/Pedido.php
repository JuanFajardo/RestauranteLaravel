<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table    = 'pedidos';
    protected $fillable = [ 'id', 'nombre', 'telefono', 'direccion', 'ci', 'tipo', 'fecha', 'hora', 'mesa', 'estado', 'latitud', 'longitud', 'id_user' ];
}
