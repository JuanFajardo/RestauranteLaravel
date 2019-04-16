<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $tabe = 'facturas';
    protected $fillable = [ 'id', 'numero_factura', 'nombre', 'nit', 'fecha', 'cantidad', 'total', 'numero_autorizacion', 'codigo_control', 'id_usuario', 'id_dosificacion', 'id_pedido' ];
}
