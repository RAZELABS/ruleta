<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Parametros;
use App\Models\Tienda;
use Illuminate\Http\Request;
use App\Models\Detalle;
use App\Models\Premios;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class RuletaController extends Controller
{
    public function index(Request $request)
    {
        $latitud = $request->session()->get('latitud');
        $longitud = $request->session()->get('longitud');
        $id_tienda = $request->session()->get('id_tienda');
        $tipo_documento = $request->session()->get('tipo_documento');
        $nro_documento = $request->session()->get('nro_documento');
        $premios = Premios::all();
        return view('frontend.ruleta', compact('premios', 'latitud', 'longitud', 'id_tienda', 'tipo_documento', 'nro_documento'));
    }

    public function registrarJugada(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitud' => 'numeric|nullable',
            'longitud' => 'numeric|nullable',
            'id_tienda' => 'required|integer|exists:tienda,codigo',
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
                            $fail('El RUC debe tener entre 3 y 12 caracteres.');
                        }
                    }
                }
            ],
            'resultado' => 'required|integer|in:1,2',
            'opcion' => 'required|integer|exists:premios,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Solo está permitido una jugada por día, inténtalo mañana.');
        }

        $hoy = Carbon::today()->format('Y-m-d');
        $registro = Detalle::where('nro_documento', $request->nro_documento)
            ->whereDate('fecha', $hoy)
            ->first();

        if ($registro) {
            $this->clearSessionData($request);
            return redirect()->back()
                ->with('error', 'Ya haz hecho una jugada hoy, solo se permite una jugada por día.')
                ->with('titulo', '=(');
        } else {
            try {
                \DB::beginTransaction();

                $detalle = new Detalle();
                $detalle->id_tienda = Tienda::where('codigo','=',$request->id_tienda)->first()->id;
                $detalle->tipo_documento = $request->tipo_documento;
                $detalle->nro_documento = $request->nro_documento;
                $detalle->resultado = $request->resultado;
                $detalle->opcion = $request->opcion;
                $detalle->fecha = Carbon::now();
                $detalle->hora = Carbon::now()->format('H:i:s');
                $detalle->latitud = $request->latitud;
                $detalle->longitud = $request->longitud;
                $detalle->save();

                \DB::commit();

                $this->clearSessionData($request);

                if ($request->resultado == 1) {
                    return redirect()->route('ganador');
                } else {
                    return redirect()->route('sorry');
                }
            } catch (\Exception $e) {
                \DB::rollBack();
                return redirect()->back()
                    ->with('error', 'Ocurrió un error al registrar la jugada. Inténtalo nuevamente.')
                    ->with('titulo', 'Error');
            }
        }
    }

    private function clearSessionData(Request $request)
    {
        $request->session()->forget(['latitud', 'longitud', 'id_tienda', 'tipo_documento', 'nro_documento']);
    }
}
