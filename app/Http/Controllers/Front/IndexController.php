<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Parametros;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $tipo_documentos = Parametros::where('flag', '=', 'tipo_documento')->get();

        return view('frontend.index', compact('tipo_documentos'));
    }
}


