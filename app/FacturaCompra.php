<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCompra extends Model
{
    protected $table = 'factura_compras';
    protected $primaryKey = 'idfacturacompra';
    protected $fillable =  [
        'idproveedor',
        'numero',
        'contrato',
        'comprador',
        'fecha',
        'documento',
        'contacto',
        'telefono',
    ];
    protected $dates = ['deleted_at'];
    public function proveedor() {
        return $this->belongsTo('App\Proveedor');
    }
}
