<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriz_dia extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'matriz_dia';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos asignables masivamente
    protected $fillable = [
        'fecha',
        'peso_dia',
    ];

    // Casts para convertir automáticamente valores al acceder
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
