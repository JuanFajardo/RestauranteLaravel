<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Dosificacion;
use App\Clases\Lin;
use App\Letras;

class PedidoController extends Controller
{
  public function __construct(){
    //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Pedido::all();

    $menus = \DB::table('menus')->where('permanente', '=', 'si')
                                ->orWhere('fecha', 'like', '%'.date('Y-m-d').'%')
                                ->get();
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
    $request['fecha'] = date('Y-m-d');
    $request['hora']  = date('Y-m-d H:i:s');
    $request['estado']  = 'pedido';
    $request['id_user'] = \Auth::user()->id;

    $cliente = new \App\Cliente;
    $cliente->cliente   =$request->nombre;
    $cliente->nit       =$request->ci;
    $cliente->id_usuario=\Auth::user()->id;
    $cliente->save();

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
      $dato->id_user  = \Auth::user()->id;
      $dato->save();
    }
    return redirect('/Pedido');
  }

  public function show($id){
    $datos = Pedido::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    if(!isset( $request->pagar ) ){
      $request['fecha'] = date('Y-m-d');
      $request['hora']  = date('Y-m-d H:i:s');
      $request['estado']  = 'pedido';
      $request['id_user'] = \Auth::user()->id;

      $dato = Pedido::find($id);
      $dato->fill($request->all());
      $dato->save();

      for ($i=1; $i <= $request->contador; $i++ ){

        $contador = \App\Detalle::find((explode("|", $request['pedido_'.$i]))[0]);

        if( count($contador) > 0 ){
          if(isset($request['eliminar_'.$i]) && $request->tipo != "pagado" ){
              $dato = \App\Detalle::find((explode("|", $request['pedido_'.$i]))[0]);
              $dato->delete();
          }
        }else{
          $dato = new \App\Detalle;
          $dato->detalle  = (explode("|", $request['pedido_'.$i]))[1];
          $dato->precio   = $request['precio_'.$i];
          $dato->cantidad = $request['cantidad_'.$i];
          $dato->hora     = date('Y-m-d H:i:s');
          $dato->id_pedido= $id;
          $dato->id_menu  = (explode("|", $request['pedido_'.$i]))[0];
          $dato->id_user  = \Auth::user()->id;
          $dato->save();
        }

      }
      return redirect('/Pedido');
    }else{

      $dato = Pedido::find($id);
      $dato->estado = "pagado";
      $dato->save();
      $costo_total    = \DB::table('detalles')->where('id_pedido', '=', $id)->sum('precio');
      $dosificacion   = Dosificacion::where('estado' , 'Activo')->get();
      $numero_factura = \DB::table('facturas')->max('numero_factura');
      $numero_factura = $numero_factura + 1;



      $factura = new \App\Factura;
      $factura->numero_factura  = $numero_factura;
      $factura->nombre          = $request->nombre;
      $factura->nit             = $request->ci;
      $factura->fecha           = date('Y-m-d');
      $factura->cantidad        = $request->contador;
      $factura->total           = $costo_total;
      $factura->numero_autorizacion  = $dosificacion[0]->nro_autorizacion;
      $factura->codigo_control  = \App\Clases\CodigoControlV7::generar($dosificacion[0]->nro_autorizacion,
                                                           $numero_factura,
                                                           $request->ci,
                                                           date('Ymd'),
                                                           $costo_total,
                                                           $dosificacion[0]['llave']);

      $factura->id_usuario      =  \Auth::user()->id;
      $factura->id_dosificacion = $dosificacion[0]['id'];
      $factura->id_pedido       = $id;
      $factura->save();

      $datos = \DB::table('pedidos')->join('detalles', 'pedidos.id', '=', 'detalles.id_pedido')
                                    ->join('facturas', 'pedidos.id', '=', 'facturas.id_pedido')
                                    ->where('pedidos.id', '=', $id)
                                    ->get();

      return view('factura.factura', compact('datos', 'dosificacion'));
    }
  }

  public function factura($id){
    $dosificacion   = Dosificacion::where('estado' , 'Activo')->get();

    $datos = \DB::table('pedidos')->join('detalles', 'pedidos.id', '=', 'detalles.id_pedido')
                                  ->join('facturas', 'pedidos.id', '=', 'facturas.id_pedido')
                                  ->where('pedidos.id', '=', $id)
                                  ->get();

    return view('factura.factura', compact('datos', 'dosificacion'));
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
