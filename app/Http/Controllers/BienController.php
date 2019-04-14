<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bien;
class BienController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Bien::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      $unidades = \DB::table('unidads')->select('unidad','id')->get();
      return view('bien.index', compact('datos', 'unidades'));
    }
  }

  public function store(Request $request){
    $dato = new Bien;
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Bien');
  }

  public function show($id){
    $datos = Bien::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Bien::find($id);
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Bien');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Bien::find($id);
      $dato->delete();
      return "Bien Eliminado";
    }else{
      return redirect('/');
    }
  }

}
