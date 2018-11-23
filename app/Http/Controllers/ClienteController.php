<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cliente;
class ClienteController extends Controller
{
  public function __construct(){
  //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Cliente::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('cliente.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Cliente;
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Cliente');
  }

  public function show($id){
    $datos = Cliente::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Cliente::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Cliente');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Cliente::find($id);
      $dato->delete();
      return "Cliente Eliminado";
    }else{
      return redirect('/');
    }
  }

}
