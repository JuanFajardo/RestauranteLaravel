<?php

Route::get('/', function () {
    if ( !isset( \Auth::user()->id ) )
      return view('auth.login');
    else
      return view('maestro');
});

Auth::routes();
Route::get('/Usuario', 'HomeController@index')->name('usuario.lista');
Route::get('/clave', 'HomeController@claveGet')->name('usuario.clave');
Route::post('/clave', 'HomeController@clavePost')->name('usuario.cambiar');




Route::resource('Proveedor', 'ProveedorController');
Route::resource('Unidad', 'UnidadController');
Route::resource('Bien', 'BienController');
Route::resource('Cliente', 'ClienteController');
Route::resource('Empleado', 'EmpleadoController');
Route::resource('Inventario', 'InventarioController');
Route::resource('Pedido', 'PedidoController');
Route::resource('Menu', 'MenuController');

Route::get('Pedidos/{id}', 'PedidoController@pedidos');
Route::get('Mapa/{id}', 'PedidoController@mapa');
