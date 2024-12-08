<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parametros;

class ParametrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parametros = Parametros::all();

        return view("admin.parametros.index", compact("parametros"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.parametros.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "flag"=> "required|string|min:3|max:20",
            "valor"=> "integer|required",
            "descripcion"=> "required|string|min:3|max:50",
        ]);
        //dd($data);
        $parametros = Parametros::create($data);
        return redirect()->route("admin.parametros.create")->with("success","Registro creado con exito");
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
        $parametros = Parametros::select('id','flag','valor','descripcion')
        ->where('id','=', $id)->first();

        //dd($parametros);
        return view("admin.parametros.edit", compact("parametros"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $data = $request->validate([
            "flag"=> "required|string",
            "valor"=> "required|numeric",
            "descripcion"=> "required|string"
        ]);

        //dd($data);
        $parametros = Parametros::where("id","=", $id)->update($data);
        return redirect()->route("admin.parametros.index")->with("success","Registro modificado con exito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
