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
        'tipo_documento',
        'nro_documento',
        'resultado',
        'hora',
        'opcion',
        'estado',
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

    public function documento()
    {
        return $this->belongsTo(Parametros::class, 'tipo_documento', 'valor')
            ->where('flag', 'tipo_documento');
    }

    public function estados()
    {
        return $this->belongsTo(Parametros::class, 'estado', 'valor')
            ->where('flag', 'estado');
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'id_tienda', 'id');
    }
}

