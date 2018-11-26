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
    $menus =\App\Menu::all();

    if ($request->ajax()) {
      return $datos;
    }else{
      return view('pedido.index', compact('datos', 'menus'));
    }
  }

  public function pedidos($id){
    $datos = \DB::table('detalles')->where('id_pedido', '=', $id)->get();
    return $datos;
  }

  public function store(Request $request){
    //return $request->all();

    $request['fecha'] = date('Y-m-d');
    $request['hora']  = date('Y-m-d H:i:s');
    $request['estado']  = 'pedido';
    $request['id_user'] = 1;//\Auth::user()->id;

    $dato = new Pedido;
    $dato->fill( $request->all() );
    $dato->save();

    $id = \DB::table('pedidos')->max('id');
    for ($i=1; $i <= $request->contador; $i++ ){
      $dato = new \App\Detalle;

      $dato->detalle  = (explode("|", $request['pedido_'.$i]))[1];
      $dato->precio   = $request['precio_'.$i];
      $dato->cantidad = $request['cantidad_'.$i];
      $dato->hora     = date('Y-m-d H:i:s');
      $dato->id_pedido= $id;
      $dato->id_menu  = (explode("|", $request['pedido_'.$i]))[0];
      $dato->id_user  = 1;//\Auth::user()->id;
      $dato->save();
    }
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
