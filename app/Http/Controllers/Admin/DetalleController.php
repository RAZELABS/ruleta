<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detalle;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $detalles = Detalle::with('tienda','documento','parametro','premio')
    ->select('id','fecha','hora','id_tienda','tipo_documento','nro_documento','latitud','longitud','resultado','opcion')
    ->get();

    foreach ($detalles as $detalle) {
        $detalle->tienda_nombre = $detalle->tienda->nombre;
        $detalle->nombrePremio= $detalle->premio->descripcion;
        $detalle->enlaceMapa = "https://www.google.com/maps/search/?api=1&query=".$detalle->latitud.",".$detalle->longitud;
    }

    //dd($detalles);
        return view("admin.detalle.index", compact("detalles"));
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

    public function disabled(Request $request, $id)
    {
        $estado = Detalle::select('estado')->where('id', '=', $id)->first();

        if ($estado->estado == 1) {
            $premios = Detalle::where('id', $id)->update(['estado' => 2]);
        } else {
            $premios = Detalle::where('id', $id)->update(['estado' => 1]);
        }
        $mensaje = 'exito';
        return redirect()->back()->with('success',$mensaje);
    }

}
