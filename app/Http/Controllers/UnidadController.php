<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Unidad;
class UnidadController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Unidad::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('unidad.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Unidad;
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Unidad');
  }

  public function show($id){
    $datos = Unidad::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Unidad::find($id);
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Unidad');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Unidad::find($id);
      $dato->delete();
      return "Unidad Eliminada";
    }else{
      return redirect('/');
    }
  }

}
