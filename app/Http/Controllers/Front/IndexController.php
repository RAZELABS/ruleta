<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Parametros;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Detalle;
use App\Models\Premios;
use Illuminate\Validation\Rule;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get query parameter before validation
            $codigo_tienda = $request->query('t');

            $validated = Validator::make([
                't' => $codigo_tienda
            ], [
                't' => 'required|integer|exists:tienda,codigo'
            ])->validate();

            $tipo_documentos = Parametros::where('flag', '=', 'tipo_documento')
            ->where(function($query) {
                $query->where('valor', '=', 4)
                      ->orWhere('valor', '=', 1);
            })
            ->get();

            return view('frontend.index', compact('tipo_documentos', 'codigo_tienda'));

        } catch (ValidationException $e) {
            return redirect()->route('error.tienda')
                ->with('error', 'Tienda no válida o no existe');
        }
    }
    public function verificar(Request $request)
    {
        // Validar los datos enviados por el formulario

        $request->validate([
            'latitud' => 'numeric',
            'longitud' => 'numeric',
            'codigo_tienda' => 'required|integer|exists:tienda,codigo',
            'tipo_documento' => 'required|integer|in:1,4',
            'nro_documento' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->tipo_documento == 1) {
                        if (strlen($value) !== 8) {
                            $fail('El DNI debe tener exactamente 8 caracteres.');
                        }
                    } elseif ($request->tipo_documento == 4) {
                        if (strlen($value) < 3 || strlen($value) > 12) {
                            $fail('El CE debe tener entre 3 y 12 caracteres.');
                        }
                    }
                },
            ],
        ]);

        $latitud = $request->latitud;
        $longitud = $request->longitud;
        $codigo_tienda = $request->codigo_tienda;
        $tipo_documento = $request->tipo_documento;
        $nro_documento = $request->nro_documento;

        // Obtener la fecha actual
        $hoy = Carbon::today()->format('Y-m-d');

        // Verificar si ya existe un registro para este DNI en el día actual
        $registro = Detalle::where('nro_documento', $nro_documento)
            ->whereDate('fecha', $hoy)
            ->first();

        if ($registro) {
            // Redirigir con mensaje si el registro ya existe
            return redirect()->back()
                ->with('error', 'Ya haz hecho una jugada hoy, solo se permite una jugada por día.')
                ->with('titulo', '=(');
        }

        // Store data in session before redirect
        session([
            'latitud' => $latitud,
            'longitud' => $longitud,
            'codigo_tienda' => $codigo_tienda,
            'tipo_documento' => $tipo_documento,
            'nro_documento' => $nro_documento
        ]);

        return redirect()->route('ruleta.index');
    }
}


