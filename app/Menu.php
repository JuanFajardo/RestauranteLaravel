<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
  use SoftDeletes;
  protected $table    = 'menus';
  protected $fillable = [ 'id', 'menu', 'precio', 'fecha', 'imagen', 'receta', 'id_usuario' ];
  protected $dates    = ['deleted_at'];

  public function setImagenAttribute($imagen){
    $this->attributes['imagen'] = md5(date('Y_m_d_H_i_s_')).'_'.$imagen->getClientOriginalName();
    $name = md5(date('Y_m_d_H_i_s_')).'_'.$imagen->getClientOriginalName();
    \Storage::disk('local')->put($name, \File::get($imagen));
  }
  
}
