<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Premios;
use App\Models\Parametros;

class PremiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premios = Premios::with("parametro","premios")->select('id','descripcion','premio','estado')->get();
        // $premiosData = $premio->map(function($premios) {
        //     return [$premios->id, $premios->descripcion, $premios->parametro->descripcion];
        // });

            //dd($premios);
            return view("admin.premios.index", compact("premios"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $parametros = Parametros::select("id","descripcion","valor")->where('flag','=','estado')->get();
        $premios = Parametros::select("id","descripcion","valor")->where('flag','=','premio')->get();
        return view("admin.premios.create", compact("parametros","premios"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "descripcion"=> "required|string|min:3|max:50",
            "premio" => "integer|required|min:1|max:2",
            "estado"=> "integer|required|min:1|max:2",
        ]);
        //dd($data);
        $premios = Premios::create($data);
        return redirect()->route("admin.premios.create")->with("success","Registro creado con exito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $premioss = Premios::with("parametro", "premios")->select('id','descripcion','premio','estado')
        ->where('id','=', $id)->first();
        $parametro = Parametros::select("id","descripcion","valor")->where('flag','=','estado')->get();
        $premios = Parametros::select("id","descripcion","valor")->where('flag','=','premio')->get();

        //dd($parametros, $premios);
        return view("admin.premios.edit", compact("premioss","parametro","premios"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            "descripcion"=> "required|string|min:3|max:50",
            "estado"=> "integer|required|min:1|max:2",
        ]);

        //dd($data);
        $premios = Premios::where("id","=", $id)->update($data);
        return redirect()->route("admin.premios.index")->with("success","Registro modificado con exito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function disabled(Request $request, $id)
    {
        $estado = Premios::select('estado')->where('id', '=', $id)->first();

        if ($estado->estado == 1) {
            $premios = Premios::where('id', $id)->update(['estado' => 2]);
        } else {
            $premios = Premios::where('id', $id)->update(['estado' => 1]);
        }
        $mensaje = 'exito';
        return redirect()->back()->with('success',$mensaje);
    }
}
