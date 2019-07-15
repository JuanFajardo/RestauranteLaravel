<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Empleado extends Model
{
  use SoftDeletes;
  protected $table    = 'empleados';
  protected $fillable = [ 'id', 'nombre', 'paterno', 'materno', 'ci', 'telefono', 'email', 'direccion', 'zona', 'fecha_nacimiento', 'id_usuario' ];
  protected $dates    = ['deleted_at'];
}
