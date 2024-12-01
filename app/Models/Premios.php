<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premios extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'premios';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos asignables masivamente
    protected $fillable = [
        'descripcion',
        'estado',
    ];

    // Casts para convertir automáticamente valores al acceder
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function parametro()
    {
        return $this->belongsTo(Parametros::class, 'estado', 'valor')
            ->where('flag', 'estado');
    }
}
