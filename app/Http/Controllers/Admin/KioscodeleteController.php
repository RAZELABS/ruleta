<?php

namespace  App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Kiosco;


class KioscodeleteController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view user', ['only' => ['index']]);
    //     $this->middleware('permission:create user', ['only' => ['create','store']]);
    //     $this->middleware('permission:update user', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete user', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $kioscos = Kiosco::select(DB::raw('fecha_carga'),
        )
        ->groupBy(DB::raw('fecha_carga'))
        ->orderBy('fecha_carga', 'DESC')
        ->get();

        //dd($kioscos);
        return view('admin.kioscodelete.index', ['kioscos' => $kioscos]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

public function edit(string $id)
    {
        //
    }

public function update(Request $request, string $id)
    {
        //
    }

public function destroy($fecha_carga)
    {
         $kioscos = Kiosco::where('fecha_carga', $fecha_carga)->get();

         //dd($kioscos);
         foreach ($kioscos as $kiosco) {
            $kiosco->delete();
         }

         return redirect()->route("admin.kioscodelete.index")->with("success","Archivo eliminado con exito");
    }
}
