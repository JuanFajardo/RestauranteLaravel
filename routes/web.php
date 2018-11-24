<?php

Route::get('/', function () { return view('welcome'); });

Route::resource('Proveedor', 'ProveedorController');
Route::resource('Unidad', 'UnidadController');
Route::resource('Bien', 'BienController');
Route::resource('Cliente', 'ClienteController');
Route::resource('Empleado', 'EmpleadoController');
Route::resource('Inventario', 'InventarioController');
Route::resource('Pedido', 'PedidoController');
Route::resource('Menu', 'MenuController');

Route::get('Mapa/{id}', 'PedidoController@mapa');
