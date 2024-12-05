<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tienda;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiendas = Tienda::select('id','codigo','qr','nombre','estado')->orderBy('codigo','asc')->get();
        // $tiendaData = $tiendas->map(function($tienda) {
        //     return [$tienda->id, $tienda->codigo,$tienda->qr, $tienda->nombre];
        // });

            return view("admin.tienda.index", compact("tiendas"));
    }

    public function generarQrs()
    {
        // Obtén todas las tiendas
        $tiendas = Tienda::all();

        foreach ($tiendas as $tienda) {
            // Generar la URL con el código de la tienda
            $url = url('https://www.ruletafalabella.com?t=' . $tienda->codigo);

            // Generar el QR y guardarlo en el almacenamiento local
            $path = public_path('qrs/' . $tienda->codigo . '.svg');

            Tienda::where('codigo','=',$tienda->codigo)->update(['qr'=> $path]);

            QrCode::format('svg')->size(500)->generate($url, $path);
        }

        // return response()->json(['message' => 'QRs generados correctamente'], 200);
        // return view('admin.tienda.index')->with('message','QR generados con exito');
        return redirect()->action([TiendaController::class, 'index'])
            ->with('success', 'QRs generados con exito');
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
        $tienda = Tienda::findOrFail($id);
        return view('tiendas.edit', compact('tienda'));
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
    $tienda = Tienda::findOrFail($id);
    //dd($tienda);

    // Alternar el estado entre 1 (activo) y 2 (inactivo)
    $tienda->estado = $tienda->estado == 1 ? 2 : 1;
    $tienda->save();

    return redirect()->route('admin.tienda.index')->with('success', 'Estado de la tienda actualizado correctamente.');
}

}
