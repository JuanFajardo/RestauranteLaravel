<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosificacion extends Model
{
  protected $table = 'dosificaciones';
  protected $fillable = array('id','numero_factura','id_usuario','nit','nro_autorizacion','llave','fecha_limite_emision','titulo','leyenda1', 'leyenda2');
}
