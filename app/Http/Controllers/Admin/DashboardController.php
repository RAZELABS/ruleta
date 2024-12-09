<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatrizDia;
use App\Models\MatrizTurno;
use App\Models\MatrizTienda;
use App\Models\Detalle;
use App\Models\Parametros;

class DashboardController extends Controller
{
    public function index(Request $request)
    {


        return view('admin.dashboard');
    }


}
