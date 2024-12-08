<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kiosco extends Model
{
    protected $table = 'kiosco';

    public $timestamps = false;

    protected $fillable = [
        'fecha_carga',
        'fecha',
        'hora',
        'tipo_documento',
        'nro_documento',
        'codigo_tienda',
        'orden_compra',
        'monto',
        'reservado_1',
        'reservado_2'
    ];

    protected $casts = [
        'hora' => 'string',
        'monto' => 'string',
        'orden_compra' => 'string',
        'estado' => 'integer'
    ];
}
