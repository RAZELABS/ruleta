<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrizTienda extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'matriz_tienda';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos asignables masivamente
    protected $fillable = [
        'id_tienda',
        'peso_tienda'
     ];

    // Casts para convertir automáticamente valores al acceder
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'id_tienda', 'id');
            // ->where('id', 'id_tienda');
    }
}
