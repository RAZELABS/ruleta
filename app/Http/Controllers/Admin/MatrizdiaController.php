<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matriz_dia;

class MatrizdiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matrizdias = Matriz_dia::select('id','fecha','peso_dia')->get();
        $matriz_diaData = $matrizdias->map(function($matriz_dia) {
            return [$matriz_dia->id, $matriz_dia->fecha, $matriz_dia->peso_dia];
        });
            //dd($matriz_diaData);
            return view("admin.matrizdia.index", compact("matriz_diaData"));
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
