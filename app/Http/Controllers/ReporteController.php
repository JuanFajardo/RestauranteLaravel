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
      return $request->all();
    }
}
