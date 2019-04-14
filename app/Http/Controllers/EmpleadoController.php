<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Empleado;
class EmpleadoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Empleado::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('empleado.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Empleado;
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Empleado');
  }

  public function show($id){
    $datos = Empleado::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Empleado::find($id);
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Empleado');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Empleado::find($id);
      $dato->delete();
      return "Empleado Eliminado";
    }else{
      return redirect('/');
    }
  }

}
