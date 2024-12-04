<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatrizTienda;

class MatriztiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriztiendas = MatrizTienda::with('tienda')->select('id','id_tienda','peso_tienda')->get();
        // $matriz_tiendaData = $matriztiendas->map(function($matriz_tienda) {
        //     return [$matriz_tienda->id, $matriz_tienda->tienda->nombre, $matriz_tienda->peso_tienda];
        // });
            //dd($matriz_tiendaData);
            return view("admin.matriztienda.index", compact("matriztiendas"));
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
        $matriz_tienda = MatrizTienda::with('tienda')->select('id','id_tienda','peso_tienda')
        ->where('id','=', $id)->first();

        //dd($parametros, $premios);
        return view("admin.matriztienda.edit", compact("matriz_tienda"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "peso_tienda"=> "required|decimal:2",
        ]);

        //dd($data);
        $matriz_tienda = MatrizTienda::where("id","=", $id)->update($data);
        return redirect()->route("admin.matriztienda.index")->with("success","Registro modificado con exito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
