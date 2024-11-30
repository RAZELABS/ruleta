<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matriz_tienda;

class MatriztiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriztiendas = Matriz_tienda::with('tienda')->select('id','id_tienda','peso_tienda')->get();
        $matriz_tiendaData = $matriztiendas->map(function($matriz_tienda) {
            return [$matriz_tienda->id, $matriz_tienda->tienda->nombre, $matriz_tienda->peso_tienda];
        });
            //dd($matriz_tiendaData);
            return view("admin.matriztienda.index", compact("matriz_tiendaData"));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
