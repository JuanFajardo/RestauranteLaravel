<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
class PedidoController extends Controller
{
  public function __construct(){
  //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Pedido::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('pedido.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Pedido;
    $request['fecha'] = date('Y-m-d');
    $request['hora']  = date('Y-m-d H:i:s');
    $request['estado']  = 'pedido';
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Pedido');
  }

  public function show($id){
    $datos = Pedido::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Pedido::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Pedido');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Pedido::find($id);
      $dato->delete();
      return "Pedido Eliminado";
    }else{
      return redirect('/');
    }
  }

  public function mapa($id){
    $dato = Pedido::find($id);
    return view('pedido.mapa', compact('dato'));
  }

}
