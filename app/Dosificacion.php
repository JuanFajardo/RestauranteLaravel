<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosificacion extends Model
{
  protected $table = 'dosificacions';
  protected $fillable = array('id','numero_factura','id_user','nit','nro_autorizacion','llave','fecha_limite_emision', 'estado', 'titulo','leyenda1', 'leyenda2');
}
