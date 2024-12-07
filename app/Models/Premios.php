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
        'premio',
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

    public function premios()
    {
        return $this->belongsTo(Parametros::class, 'premio', 'valor')
            ->where('flag', 'premio');
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class, 'opcion', 'id');
    }

}
