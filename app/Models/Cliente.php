<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'cliente';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos asignables masivamente
    protected $fillable = [
        'ruc',
        'razon_social',
        'direccion',
        'ubigeo',
        'latitud',
        'longitud',
        'pais',
        'telefono',
        'email',
        'rubro_id',
        'website',
        'estado',
    ];

    // Casts para convertir automáticamente valores al acceder
    protected $casts = [
        'latitud' => 'float',
        'longitud' => 'float',
        'estado' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relación con el modelo Rubro
     */
    public function rubro()
    {
        return $this->belongsTo(Rubro::class, 'rubro_id');
    }

    /**
     * Método accesor para el estado (activo/inactivo)
     */
    public function getEstadoLabelAttribute()
    {
        return $this->estado === 1 ? 'Activo' : 'Inactivo';
    }
}
