<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Premios;

class PremiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premio = Premios::select('id','descripcion','estado')->get();
        $premiosData = $premio->map(function($premios) {
            return [$premios->id, $premios->descripcion, $premios->parametro->descripcion];
        });

            return view("admin.premios.index", compact("premiosData"));
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
