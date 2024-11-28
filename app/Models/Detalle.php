<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'detalle';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos asignables masivamente
    protected $fillable = [
        'fecha',
        'id_tienda',
        'dni',
        'resultado',
        'tipo_tarjeta',
        'hora',
        'opcion',
    ];

    // Casts para convertir automáticamente valores al acceder
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Método para relacionar resultado con parametros
    public function parametro()
    {
        return $this->belongsTo(Parametros::class, 'resultado', 'valor')
            ->where('flag', 'resultado');
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'id_tienda', 'id');
            // ->where('id', 'id_tienda');
    }
}

