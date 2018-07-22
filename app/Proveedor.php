<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    protected $table = 'proveedores';
    protected $primaryKey = 'idproveedor';
    protected $fillable = [
        'ruc',
        'nombre',
        'direccion',
        'telefono',
    ];
    protected $dates = ['deleted_at'];

    public function materiales() {
        return $this->hasMany('App\Material', 'idmaterial');
    }
    public function facturaCompras() {
        return $this->hasMany('App\FacturaCompra', 'idfacturacompra');
    }


    public static function boot()
    {
        parent::boot();
        static::deleting(function($padre) {
            $padre->materiales()->delete();
            $padre->facturaCompras()->delete();
        });
    }

    /*Eliminacion en cascada, todos sus registros hijo, mueren tambien*/
/*    public static function boot()
    {
        parent::boot();
        static::deleting(function ($parent) {
            $materiales = $parent->materiales();
            foreach ($materiales as $material) {
                $material->delete();
            }
        });
    }*/

}
