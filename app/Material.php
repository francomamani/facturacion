<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $table = 'materiales';
    protected $primaryKey = 'idmaterial';
    protected $fillable = [
        'idproveedor',
        'nombre',
        'descripcion'
    ];
    protected $dates = ['deleted_at'];
    public function proveedor() {
        return $this->belongsTo('App\Proveedor', 'idproveedor');
    }

}
