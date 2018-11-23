<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Proveedor;
class ProveedorController extends Controller
{
  public function __construct(){
  //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Proveedor::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('proveedor.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Proveedor;
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Proveedor');
  }

  public function show($id){
    $datos = Proveedor::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Proveedor::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Proveedor');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Proveedor::find($id);
      $dato->delete();
      return "Proveedor Eliminada";
    }else{
      return redirect('/');
    }
  }

}
