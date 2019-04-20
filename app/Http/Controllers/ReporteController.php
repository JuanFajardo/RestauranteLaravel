<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){
      return view('reporte.index');
    }

    public function reporte(Request $request){
      $inicio = $request->inicio;
      $fin    = $request->fin;

      $datos = \DB::table('facturas')->join('users', 'facturas.id_usuario', '=', 'users.id')
                                     ->where('facturas.created_at', '>', date('Y-m-d', strtotime($inicio."- 1 days")) )
                                     ->where('facturas.created_at', '<', date('Y-m-d', strtotime($fin."+ 1 days"))    )
                                     ->select('facturas.*', 'users.name')
                                     ->get();
      if ($request->button == "web"){
        return view("reporte.index", compact('datos') );
      }else{
        $view =  \View::make('reporte.pdf', compact('datos', 'inicio', 'fin'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
      }
    }

    public function celular(){
      $datos = \DB::table('menus')->where('permanente', '=', 'si')
                                  ->orWhere('fecha', 'like', '%'.date('Y-m-d').'%')
                                  ->get();
      return view('reporte.celular', compact('datos'));
    }

    public function celularPost(Request $request){

      $dato = new \App\Pedido;
      $dato->nombre   = $request->nombre;
      $dato->telefono = $request->celular;
      $dato->direccion= $request->direccion;
      $dato->ci       = $request->ci;
      $dato->tipo     = $request->celular;
      $dato->fecha    = date('Y-m-d');
      $dato->hora     = date('Y-m-d H:i:s');
      $dato->mesa     = "0";
      $dato->estado   = "celular";
      $dato->latitud  = $request->latitud  == "null" ?  $request->latitud : "-19.5891365";
      $dato->longitud = $request->longitud  == "null" ? $request->longitud : "-65.7535577";
      $dato->id_user  = "0";
      $dato->save();

      $id_pedido = \DB::table('pedidos')->max('id');
      for($i=1; $i<=$request->canditdad; $i++){
        $comida = \App\Menu::find($request["menu".$i]);
        $detalle = new \App\Detalle;
        $detalle->detalle   = $comida->menu;
        $detalle->precio    = $comida->precio;
        $detalle->cantidad  = $request["cantidad".$i];
        $detalle->hora      = date('Y-m-d H:i:s');
        $detalle->id_pedido = $id_pedido;
        $detalle->id_menu   = $comida->id;
        $detalle->id_user   = "0";
        $detalle->save();
      }

      $datos = \DB::table('menus')->where('permanente', '=', 'si')
                                  ->orWhere('fecha', 'like', '%'.date('Y-m-d').'%')
                                  ->get();
      $msj = "si";
      return view('reporte.celular', compact('datos', 'msj'));
    }
}
