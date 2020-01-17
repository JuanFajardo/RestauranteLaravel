<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Dosificacion;

class DosificacionController extends Controller
{
  public function __construct(){
     $this->middleware('auth');
  }

  public function index(){
    $dosificaciones=\DB::table('dosificacions')->get();

    $actual = \DB::table('dosificacions')->select('dosificacions.*')->orderBy('id','DESC')->get();
    //$actual = $actual[0];
    //return $actual;
    $flag = ( count($actual) == 0 ) ? 0 : 1;

    return view("dosificacion.index",compact("dosificaciones","actual","flag"));
  }

  public function store(Request $request){
      $this->validate($request,[
      'numero_factura'=>'required|numeric',
      'nit'=>'required|numeric',
      'nro_autorizacion'=>'required|numeric',
      'llave'=>'required',
      'titulo'=>'required',
      'leyenda1'=>'required',
      'leyenda2'=>'required',
      ]);
      $request['id_user']  = \Auth::user()->id;
      $request['estado']   = 'Activo';

      $dosificacion= new Dosificacion;
      $dosificacion->fill( $request->all() );
      $dosificacion->save();
      return redirect('/Dosificacion');
  }

  public function show($id){
        $dosificacion = Dosificacion::find($id);
        return "[".$dosificacion."]";
  }

  public function update(Request $request){
        $this->validate($request,[
        'numero_factura'=>'required|numeric',
        'nit'=>'required|numeric',
        'nro_autorizacion'=>'required|numeric',
        'llave'=>'required',
        'titulo'=>'required|alpha',
        'leyenda1'=>'required',
        'leyenda2'=>'required',
        ]);
            $id=$request->id;
            $request['id_user']  = \Auth::user()->id;
            $datos = Dosificacion::find($id);
            $datos->fill( $request->all() );
            $datos->save();
          return redirect('SIIM/Dosificacion');

  }

  public function dosificacion($nro_autorizacion, $numero_factura, $ci, $fecha, $costo_total, $dosificacion){
    $codigo_control  = \App\Clases\CodigoControlV7::generar($nro_autorizacion,
                                                         $numero_factura,
                                                         $ci,
                                                         $fecha,
                                                         $costo_total,
                                                         $dosificacion);
   return array(["codigo"=>$codigo_control]);
  }

  public function destroy(Request $request){
      $id=$request->id_borrar;
      $dosificacion = Dosificacion::find($id);
      $dosificacion->delete();
      return redirect('SIIM/Dosificacion');
  }

}
