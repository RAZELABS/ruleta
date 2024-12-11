<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatrizGlobal;

class MatrizglobalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matrizglobals = MatrizGlobal::select('id','descripcion','peso_global')->get();
        // $matriz_globalData = $matrizglobals->map(function($matriz_global) {
        //     return [$matriz_global->id, $matriz_global->global->nombre, $matriz_global->peso_global];
        // });
            //dd($matriz_globalData);
            return view("admin.matrizglobal.index", compact("matrizglobals"));
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
        $matriz_global = MatrizGlobal::select('id','descripcion','peso_global')
        ->where('id','=', $id)->first();

        //dd($parametros, $premios);
        return view("admin.matrizglobal.edit", compact("matriz_global"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "peso_global"=> "required|decimal:2|max:50",
        ]);

        //dd($data);
        $matriz_global = MatrizGlobal::where("id","=", $id)->update($data);
        return redirect()->route("admin.matrizglobal.index")->with("success","Registro modificado con exito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
