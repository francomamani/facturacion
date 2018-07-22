<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('proveedores', 'ProveedorController', ['except' => ['create', 'edit']]);
Route::resource('materiales', 'MaterialController', ['except' => ['create', 'edit']]);
Route::resource('factura_compras', 'FacturaCompraController', ['except' => ['create', 'edit']]);

/*recuperacion de documentos, archivos e imagenes*/
Route::get('factura_compras_documento/{id}', 'FacturaCompraController@getDocumento');

