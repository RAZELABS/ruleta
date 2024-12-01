<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detalle;
use Carbon\Carbon;

class VerificacionController extends Controller
{
    /**
     * Verificar si el DNI ya tiene un registro en el día actual.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verificar(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'id_tienda' => 'required|integer|exists:tienda,id',
            'dni' => 'required|string|max:20',
        ]);

        $dni = $request->dni;
        $id_tienda = $request->id_tienda;

        // Obtener la fecha actual
        $hoy = Carbon::today();

        // Verificar si ya existe un registro para este DNI en el día actual
        $registro = Detalle::where('dni', $dni)
            ->whereDate('fecha', $hoy)
            ->first();

        if ($registro) {
            // Redirigir con mensaje si el registro ya existe
            return redirect('/')
                ->with('error', 'Este usuario ya ha hecho una jugada hoy, solo se permite una jugada por día.');
        }

        // Si no existe registro, permitir continuar
        // Aquí puedes realizar la lógica para guardar o procesar los datos si es necesario
        return redirect('/')
            ->with('success', 'El usuario puede realizar una jugada.');
    }
}
