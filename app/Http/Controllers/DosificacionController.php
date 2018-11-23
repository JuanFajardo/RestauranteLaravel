<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosificacionController extends Controller
{
  public function __construct(){
     //$this->middleware('auth');
  }

  public function index(){
    $dosificaciones=\DB::table('dosificaciones')->get();
    $actual=\DB::table('dosificaciones')->orderBy('id','DESC')->first();
    $flag=(count($actual)==0)? 0:1;
    return view("dosificaciones/listar",compact("dosificaciones","actual","flag"));
  }

  public function store(Request $request){
      $this->validate($request,[
      'numero_factura'=>'required|numeric',
      'nit'=>'required|numeric',
      'nro_autorizacion'=>'required|numeric',
      'llave'=>'required',
      'titulo'=>'required|alpha',
      'leyenda1'=>'required',
      'leyenda2'=>'required',
      ]);
      $request['id_usuario']  = \Auth::user()->id;
      $dosificacion= new dosificaciones;
      $dosificacion->fill( $request->all() );
      $dosificacion->save();
      return redirect('Dosificacion');
  }

  public function show($id){
        $dosificacion = dosificaciones::find($id);
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
            $request['id_usuario']  = \Auth::user()->id;
            $datos = dosificaciones::find($id);
            $datos->fill( $request->all() );
            $datos->save();
          return redirect('SIIM/Dosificacion');

  }

  public function destroy(Request $request){
      $id=$request->id_borrar;
      $dosificacion = dosificaciones::find($id);
      $dosificacion->delete();
      return redirect('SIIM/Dosificacion');
  }

}
