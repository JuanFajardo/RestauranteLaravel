<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cliente extends Model
{
  use SoftDeletes;
  protected $table    = 'clientes';
  protected $fillable = [ 'id', 'cliente', 'nit', 'id_usuario' ];
  protected $dates    = ['deleted_at'];
}
