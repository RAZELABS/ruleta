<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatrizDia;

class MatrizdiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matrizdias = MatrizDia::select('id','fecha','peso_dia')->get();
        // $matriz_diaData = $matrizdias->map(function($matriz_dia) {
        //     return [$matriz_dia->id, $matriz_dia->fecha, $matriz_dia->peso_dia];
        // });
            //dd($matrizdias);
            return view("admin.matrizdia.index", compact("matrizdias"));
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
        $matriz_dia = MatrizDia::select('id','fecha','peso_dia')
        ->where('id','=', $id)->first();

        //dd($parametros, $premios);
        return view("admin.matrizdia.edit", compact("matriz_dia"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $data = $request->validate([
            "peso_dia"=> "required|decimal:2",
        ]);

        //dd($data);
        $matriz_dia = MatrizDia::where("id","=", $id)->update($data);
        return redirect()->route("admin.matrizdia.edit", $id)->with("success","Registro modificado con exito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
