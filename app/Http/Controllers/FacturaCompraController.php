<?php

namespace App\Http\Controllers;

use App\FacturaCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacturaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(FacturaCompra::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('documento')){
            $path_documento = $request->file('documento')->store('documentos');
            $factura_compra = new FacturaCompra();
            $factura_compra->idproveedor = $request->input('idproveedor');
            $factura_compra->numero = $request->input('numero');
            $factura_compra->contrato = $request->input('contrato');
            $factura_compra->comprador = $request->input('comprador');
            $factura_compra->fecha = $request->input('fecha');
            $factura_compra->documento = $path_documento;
            $factura_compra->contacto = $request->input('contacto');
            $factura_compra->telefono = $request->input('telefono');
            $factura_compra->save();
            return response()->json($factura_compra, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(FacturaCompra::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(FacturaCompra $facturaCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $factura_compra = FacturaCompra::find($id);
        $factura_compra->update($request->all());
        return response()->json($factura_compra, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura_compra = FacturaCompra::find($id);
//        Storage::delete($factura_compra->documento);
        $factura_compra->delete();
        return response()->json([
            'eliminado' => 'La factura de compra con #' . $factura_compra->numero
                          . ' fue eliminado exitosamente'
        ], 200);
    }
    public function getDocumento($id){
        $factura_compra = FacturaCompra::find($id);
        return response()->file(storage_path('app/' . $factura_compra->documento));
        //return response()->download(storage_path('app/' . $factura_compra->documento));
    }

}
