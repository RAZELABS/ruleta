<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Parametros;
use App\Models\Tienda;
use Illuminate\Http\Request;
use App\Models\Detalle;
use App\Models\Premios;
use App\Models\MatrizTienda;
use App\Models\MatrizTurno;
use App\Models\MatrizDia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class RuletaController extends Controller
{
    public function index(Request $request)
    {
        $latitud = $request->session()->get('latitud');
        $longitud = $request->session()->get('longitud');
        $codigo_tienda = $request->session()->get('codigo_tienda');
        $tipo_documento = $request->session()->get('tipo_documento');
        $nro_documento = $request->session()->get('nro_documento');
        $fechaHoy = Carbon::now()->format('Y:m:d');
        $horaActual = Carbon::now()->format('H:i:s');
        $id_tienda = Tienda::where('codigo', '=', $codigo_tienda)->select('id')->first();
        $premios = Premios::all();

        // valores del juego
        $cantidad_ganadores = Parametros::where('flag', '=', 'ganadores')->select('valor')->first(); // valor = 1568 personas
        $duracion_dias_juego = count(MatrizDia::all()); // valor = 16 dias
        // valores ruleta
        $cantidad_opciones_ruleta = count($premios); // valor = 8
        $cantidad_opciones_ganadoras = count($premios->where('premio', '=', 1)); // valor = 1
        $cantidad_opciones_perdedoras = count($premios->where('premio', '=', 2)); // valor = 2
        // valores Matriz
        $matriz_dia = MatrizDia::where('fecha', '=', $fechaHoy)->select('peso_dia')->first(); // valor ejemplo  = 5.29%
        $matriz_turno = MatrizTurno::whereTime('inicio', '<=', $horaActual)
            ->whereTime('fin', '>=', $horaActual)->select('peso_turno', 'inicio', 'fin')->first(); // valor ejemplo  = 21.00%
        $matriz_tienda = MatrizTienda::where('id_tienda', '=', $id_tienda->id)->select('peso_tienda')->first(); // valor ejemplo = 2.04%

        // Verificar si hay cupos disponibles para ganadores
        $hay_cupos = $this->verificarCuotaGanadores(
            $id_tienda->id,
            $cantidad_ganadores,
            $duracion_dias_juego,
            $matriz_dia,
            $matriz_turno,
            $matriz_tienda
        );

        if ($hay_cupos) {
            // Calcular probabilidad solo si hay cupos disponibles
            $probabilidad = $this->calcularProbabilidadTotal($cantidad_ganadores, $duracion_dias_juego, $matriz_dia, $matriz_turno, $matriz_tienda);
            $random = mt_rand() / mt_getrandmax();
            $ganador = $random <= $probabilidad;
        } else {
            // Si no hay cupos, forzar pérdida
            $ganador = false;
        }

        // Obtener opciones según el resultado
        $opciones_ganadoras = $premios->where('premio', 1)->pluck('id')->toArray();
        $opciones_perdedoras = $premios->where('premio', 2)->pluck('id')->toArray();

        $opcion_seleccionada = $ganador ?
            $opciones_ganadoras[array_rand($opciones_ganadoras)] :
            $opciones_perdedoras[array_rand($opciones_perdedoras)];

        // dd($opcion_seleccionada);
        $opcion_seleccionada = 1;
        return view('frontend.ruleta', compact(
            'premios',
            'latitud',
            'longitud',
            'codigo_tienda',
            'id_tienda',
            'tipo_documento',
            'nro_documento',
            'opcion_seleccionada'
        ));
    }

    public function registrarJugada(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitud' => 'numeric|nullable',
            'longitud' => 'numeric|nullable',
            'id_tienda' => 'required|integer|exists:tienda,id',
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
                $tienda = new Tienda();

                $detalle->id_tienda = $tienda->where('id', '=', $request->id_tienda)->first()->id;
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

                $codigo_tienda = $tienda->where('id', '=', $request->id_tienda)->first()->codigo;
                //dd($codigo_tienda);
                switch ($request->resultado) {
                    case 1:
                        return redirect()->route('ganador')->with('codigo_tienda', $codigo_tienda);
                    case 2:
                        return redirect()->route('sorry')->with('codigo_tienda', $codigo_tienda);
                    default:
                        return redirect()->back()->with('error', 'Resultado inválido.');
                }
            } catch (\Exception $e) {
                \DB::rollBack();
                return redirect()->back()
                    ->with('error', 'Ocurrió un error al registrar la jugada. Inténtalo nuevamente.')
                    // ->with('error', $e->getMessage())
                    ->with('titulo', 'Error');
            }
        }
    }
    public function ganador(Request $request)
    {
        return view('frontend.ganador')->with('codigo_tienda', $request->session()->get('codigo_tienda'));
    }
    public function sorry(Request $request){
        return view('frontend.sorry')->with('codigo_tienda', $request->session()->get('codigo_tienda'));

    }

    /**
     * Calcula la probabilidad total basada en los pesos de día, turno y tienda
     */
    private function calcularProbabilidadTotal($cantidad_ganadores, $duracion_dias, $peso_dia, $peso_turno, $peso_tienda)
    {
        // Cantidad promedio de ganadores por día
        $ganadores_por_dia = $cantidad_ganadores->valor / $duracion_dias;

        // Probabilidad base por día (peso del día)
        $probabilidad_dia = ($peso_dia->peso_dia / 100) * $ganadores_por_dia;

        // Aplicar peso del turno
        $probabilidad_turno = ($peso_turno->peso_turno / 100) * $probabilidad_dia;

        // Aplicar peso de la tienda
        $probabilidad_final = ($peso_tienda->peso_tienda / 100) * $probabilidad_turno;
        //dd('ganadores dia: '.$ganadores_por_dia, 'probabilidad dia: '.$probabilidad_dia, 'probabilidad turno: '.$probabilidad_turno);
        return $probabilidad_final;
    }

    private function verificarCuotaGanadores($id_tienda, $cantidad_ganadores, $duracion_dias, $matriz_dia, $matriz_turno, $matriz_tienda)
    {
        // 1. Calcular cuota de ganadores por día
        $ganadores_por_dia = ceil($cantidad_ganadores->valor / $duracion_dias);

        // 2. Calcular cuota de ganadores para la tienda actual en este día
        $cuota_tienda = ceil(($matriz_tienda->peso_tienda / 100) * $ganadores_por_dia);

        // 3. Calcular cuota de ganadores para el turno actual
        $cuota_turno = ceil(($matriz_turno->peso_turno / 100) * $cuota_tienda);

        // 4. Obtener ganadores actuales
        $fecha_actual = Carbon::now()->format('Y-m-d');

        // Contar ganadores del día para esta tienda - cambiando 'resultado' por 'valor'
        $ganadores_tienda_hoy = Detalle::where('id_tienda', $id_tienda)
            ->where('resultado', 1) // Cambio de 'resultado' a 'valor'
            ->whereDate('fecha', $fecha_actual)
            ->count();


        // Contar ganadores del turno actual
        $ganadores_turno_actual = Detalle::where('id_tienda', $id_tienda)
            ->where('resultado', 1) // Cambio de 'resultado' a 'valor'
            ->whereDate('fecha', $fecha_actual)
            ->whereTime('hora', '>=', $matriz_turno->inicio)
            ->whereTime('hora', '<=', $matriz_turno->fin)
            ->count();


        // 5. Verificar si hay cupos disponibles
        $hay_cupo_tienda = $ganadores_tienda_hoy < $cuota_tienda;
        $hay_cupo_turno = $ganadores_turno_actual < $cuota_turno;

        //Agregar logs para depuración
        // dd( [
        //     'id_tienda' => $id_tienda,
        //     'fecha' => $fecha_actual,
        //     'cuota_tienda' => $cuota_tienda,
        //     'cuota_turno' => $cuota_turno,
        //     'ganadores_tienda_hoy' => $ganadores_tienda_hoy,
        //     'ganadores_turno_actual' => $ganadores_turno_actual,
        //     'turno_inicio' => $matriz_turno->inicio,

        //     'turno_fin' => $matriz_turno->fin,
        //     'hay_cupo_tienda' => $hay_cupo_tienda,
        //     'hay_cupo_turno' => $hay_cupo_turno
        // ]);

        return $hay_cupo_tienda && $hay_cupo_turno;
    }

    private function clearSessionData(Request $request)
    {
        $request->session()->forget(['latitud', 'longitud', 'id_tienda', 'tipo_documento', 'nro_documento']);
    }

    public function dashboard()
    {
        $days = MatrizDia::pluck('fecha')->toArray();
        $winnersPerDay = [];
        $remainingWinners = [];
        $winningPlays = Detalle::where('valor', 1)->count();
        $losingPlays = Detalle::where('valor', 2)->count();

        foreach ($days as $day) {
            $winnersPerDay[] = Detalle::whereDate('fecha', $day)->where('valor', 1)->count();
            $remainingWinners[] = $this->calculateRemainingWinners($day);
        }

        return view('admin.dashboard', compact('days', 'winnersPerDay', 'remainingWinners', 'winningPlays', 'losingPlays'));
    }

    private function calculateRemainingWinners($day)
    {
        $totalWinners = Parametros::where('flag', 'ganadores')->value('valor');
        $winnersSoFar = Detalle::whereDate('fecha', '<=', $day)->where('valor', 1)->count();
        return $totalWinners - $winnersSoFar;
    }
}
