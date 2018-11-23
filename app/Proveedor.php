<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proveedor extends Model
{
  use SoftDeletes;
  protected $table    = 'proveedors';
  protected $fillable = [ 'id', 'proveedor', 'rubro', 'entidad', 'responsable', 'ciudad', 'direccion', 'telefono', 'correo', 'nit', 'id_usuario' ];
  protected $dates    = ['deleted_at'];
}
