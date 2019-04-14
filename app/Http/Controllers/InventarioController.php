<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Inventario;
class InventarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Inventario::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('inventario.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Inventario;
    $request['user_id'] = \Auth::user()->id;

    if( $request->tipo == "USO" ){
      $request['fecha_uso'] = date('Y-m-d');
    }else{
      $request['fecha_baja'] = date('Y-m-d');
    }

    $dato->fill($request->all());
    $dato->save();
    return redirect('/Inventario');
  }

  public function show($id){
    $datos = Inventario::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Inventario::find($id);
    $request['user_id'] = \Auth::user()->id;

    if( $request->tipo == "USO" ){
      $request['fecha_uso'] = date('Y-m-d');
    }else{
      $request['fecha_baja'] = date('Y-m-d');
    }

    $dato->fill($request->all());
    $dato->save();
    return redirect('/Inventario');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Inventario::find($id);
      $dato->delete();
      return "Inventario Eliminado";
    }else{
      return redirect('/');
    }
  }

}
