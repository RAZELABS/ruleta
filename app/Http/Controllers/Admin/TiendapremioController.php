<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TiendaPremio;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TiendapremioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiendapremios = TiendaPremio::with('tiendas','premios','estados')->select('id', 'id_tienda', 'id_premio','estado')->get();
        // $tiendaData = $tiendas->map(function($tienda) {
        //     return [$tienda->id, $tienda->codigo,$tienda->qr, $tienda->nombre];
        // });

            //dd($tiendapremios);
        return view("admin.tiendapremio.index", compact("tiendapremios"));
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
        $tiendapremio = TiendaPremio::findOrFail($id);
        return view('tiendapremio.edit', compact('tiendapremio'));
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
    public function disabled($id)
    {
        $tiendapremio = TiendaPremio::findOrFail($id);
        //dd($tienda);

        // Alternar el estado entre 1 (activo) y 2 (inactivo)
        $tiendapremio->estado = $tiendapremio->estado == 1 ? 2 : 1;
        $tiendapremio->save();

        return redirect()->route('admin.tiendapremio.index')->with('success', 'Estado actualizado correctamente.');
    }

}
