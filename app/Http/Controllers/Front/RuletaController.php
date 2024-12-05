<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Parametros;
use Illuminate\Http\Request;
use App\Models\Detalle;
use Carbon\Carbon;

class RuletaController extends Controller
{
    public function index(){

        return view('frontend.ruleta');

    }
    public function ganador(){

        return view('frontend.ganador');

    }
    public function sorry(){

        return view('frontend.sorry');

    }
}
