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


//array('id','numero_factura','id_usuario','nit','nro_autorizacion','llave','fecha_limite_emision','titulo','leyenda1', 'leyenda2');

Route::resource('Proveedor', 'ProveedorController');
Route::resource('Dosificacion', 'DosificacionController');
Route::resource('Unidad', 'UnidadController');
Route::resource('Bien', 'BienController');
Route::resource('Cliente', 'ClienteController');
Route::resource('Empleado', 'EmpleadoController');
Route::resource('Inventario', 'InventarioController');
Route::resource('Pedido', 'PedidoController');
Route::resource('Menu', 'MenuController');

Route::get('Pedidos/{id}', 'PedidoController@pedidos');

Route::get('Pagar/{id}', 'PedidoController@pagar');
Route::get('Facturar/{id}', 'PedidoController@pfactura');

Route::get('Mapa/{id}', 'PedidoController@mapa');
