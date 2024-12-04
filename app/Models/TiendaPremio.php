<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiendaPremio extends Model
{
    use HasFactory;
    // Nombre de la tabla asociada
    protected $table = 'tienda_premio';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos asignables masivamente
    protected $fillable = [
        'id_tienda',
        'id_premio',
        'estado',
    ];

    // Casts para convertir automáticamente valores al acceder
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function tiendas()
    {
        return $this->belongsTo(Tienda::class, 'id_tienda', 'id');
    }

    public function premios()
    {
        return $this->belongsTo(Premios::class, 'id_premio', 'id');
    }

    public function estados()
    {
        return $this->belongsTo(Parametros::class, 'estado', 'valor')
        ->where('flag','=', 'estado');
    }
}
