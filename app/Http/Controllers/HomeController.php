<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = \App\User::all();
        return view('usuario.index', compact('datos'));
    }


    public function claveGet(){
      return view('clave');
    }

    public function clavePost(Request $request){
      //return $request->all();
      $id = \Auth::user()->id;
      $dato = \App\User::find($id);
      $dato->password = bcrypt($request->clave);
      $dato->save();
      $clave = "OK";
      return redirect('/')->with( ['clave' => $clave] );;
    }

}
