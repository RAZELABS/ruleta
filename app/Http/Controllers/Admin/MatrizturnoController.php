<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatrizTurno;

class MatrizturnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matrizturnos = MatrizTurno::select('id','turno','inicio','fin','peso_turno')->get();
        // $matriz_turnoData = $matrizturnos->map(function($matriz_turno) {
        //     return [$matriz_turno->id, $matriz_turno->turno, $matriz_turno->inicio, $matriz_turno->fin, $matriz_turno->peso_turno];
        // });
            //dd($matriz_turnoData);
            return view("admin.matrizturno.index", compact("matrizturnos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $matriz_turno = MatrizTurno::select('id','turno','inicio','fin','peso_turno')
        ->where('id','=', $id)->first();

        //dd($parametros, $premios);
        return view("admin.matrizturno.edit", compact("matriz_turno"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                //dd($request->all());
                $data = $request->validate([
                    "peso_turno"=> "required|decimal:2",
                ]);

                //dd($data);
                $matriz_turno = MatrizTurno::where("id","=", $id)->update($data);
                return redirect()->route("admin.matrizturno.index")->with("success","Registro modificado con exito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
