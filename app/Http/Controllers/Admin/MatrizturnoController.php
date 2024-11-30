<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matriz_turno;

class MatrizturnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matrizturnos = Matriz_turno::select('id','turno','inicio','fin','peso_turno')->get();
        $matriz_turnoData = $matrizturnos->map(function($matriz_turno) {
            return [$matriz_turno->id, $matriz_turno->turno, $matriz_turno->inicio, $matriz_turno->fin, $matriz_turno->peso_turno];
        });
            //dd($matriz_turnoData);
            return view("admin.matrizturno.index", compact("matriz_turnoData"));
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
