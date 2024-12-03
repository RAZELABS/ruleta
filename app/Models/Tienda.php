<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'tienda';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos asignables masivamente
    protected $fillable = [
        'codigo',
        'nombre',
        'qr',
        'estado',
    ];

    // Casts para convertir automáticamente valores al acceder
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
