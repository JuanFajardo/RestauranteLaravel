<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Unidad extends Model
{
  use SoftDeletes;
  protected $table    = 'unidads';
  protected $fillable = [ 'id', 'unidad', 'id_usuario' ];
  protected $dates    = ['deleted_at'];
}
