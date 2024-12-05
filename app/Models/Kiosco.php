<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kiosco extends Model
{
    protected $table = "programacioncurso";
    protected $primarykey = "idProgramacionCurso";
    protected $fillable = [
        'fecha',
        'nrc',
        'curso',
        'fecha',
        'dia',
        'hora_inicio',
        'hora_fin',
        'estado',

}
