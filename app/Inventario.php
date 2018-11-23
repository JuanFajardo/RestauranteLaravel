<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inventario extends Model
{
  use SoftDeletes;
  protected $table    = 'inventarios';
  protected $fillable = [ 'id', 'inventario', 'cantidad', 'lugar', 'tipo', 'fecha_uso', 'fecha_baja', 'observacion', 'id_usuario' ];
  protected $dates    = ['deleted_at'];
}
