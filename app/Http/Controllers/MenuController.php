<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Menu;
class MenuController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Menu::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('menu.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Menu;
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Menu');
  }

  public function show($id){
    $datos = Menu::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Menu::find($id);
    $request['user_id'] = \Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Menu');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Menu::find($id);
      $dato->delete();
      return "Menu Eliminado";
    }else{
      return redirect('/');
    }
  }

}
