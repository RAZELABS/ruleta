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
            $tiendaId = $request->query('t');

            $validated = Validator::make([
                't' => $tiendaId
            ], [
                't' => 'required|integer|exists:tienda,codigo'
            ])->validate();

            $tipo_documentos = Parametros::where('flag', '=', 'tipo_documento')->get();

            return view('frontend.index', compact('tipo_documentos', 'tiendaId'));

        } catch (ValidationException $e) {
            return redirect()->route('error.tienda')
                ->with('error', 'Tienda no válida o no existe');
        }
    }
    public function verificar(Request $request)
    {
        // Validar los datos enviados por el formulario

        $request->validate([
            'id_tienda' => 'required|integer|exists:tienda,codigo',
            'tipo_documento' => 'required|integer|in:1,2',
            'nro_documento' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->tipo_documento == 1) {
                        if (strlen($value) !== 8) {
                            $fail('El DNI debe tener exactamente 8 caracteres.');
                        }
                    } elseif ($request->tipo_documento == 2) {
                        if (strlen($value) < 3 || strlen($value) > 12) {
                            $fail('El CE debe tener entre 3 y 12 caracteres.');
                        }
                    }
                },
            ],
        ]);

        $nro_documento = $request->nro_documento;
        $id_tienda = $request->id_tienda;

        // Obtener la fecha actual
        $hoy = Carbon::today()->format('Y-m-d');

        // Verificar si ya existe un registro para este DNI en el día actual
        $registro = Detalle::where('nro_documento', $nro_documento)
            ->whereDate('fecha', $hoy)
            ->first();

        if ($registro) {
            // Redirigir con mensaje si el registro ya existe
            return redirect()->back()
                ->with('error', 'Ya haz hecho una jugada hoy, solo se permite una jugada por día.');
        }
        $premios= Premios::all();

        // Si no existe registro, permitir continuar
        // Aquí puedes realizar la lógica para guardar o procesar los datos si es necesario
        return redirect()->route('ruleta.index')
            ->with(compact('premios'))
            ->with('success', 'Mucha suerte.');
    }
}


