<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatrizDia;
use App\Models\Detalle;
use App\Models\Parametros;
use Carbon\Carbon;
use App\Models\Tienda;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Obtener datos para el gráfico
        $chartData = $this->getChartData();

        // Obtener datos para los contadores
        $countersData = $this->getCountersData();

        // Obtener datos adicionales para los contadores
        $totalParticipantes = Detalle::count();
        $totalGanadores = Detalle::where('resultado', 1)->count();
        $totalPerdedores = Detalle::where('resultado', 2)->count();
        $totalGanadoresDia = Detalle::where('resultado', 1)->whereDate('fecha', Carbon::today()->format('Y-m-d'))->count();
        $totalPerdedoresDia = Detalle::where('resultado', 2)->whereDate('fecha', Carbon::today()->format('Y-m-d'))->count();

        return view('admin.dashboard', array_merge($chartData, $countersData, compact('totalParticipantes', 'totalGanadores', 'totalPerdedores', 'totalGanadoresDia', 'totalPerdedoresDia')));
    }

    /**
     * Obtener datos para el gráfico
     *
     * @return array
     */
    private function getChartData()
    {
        $today = Carbon::today()->format('Y-m-d');
        $stores = Tienda::pluck('nombre')->toArray();
        $winnersPerStore = [];
        $losersPerStore = [];

        foreach ($stores as $store) {
            $storeId = Tienda::where('nombre', $store)->value('id');
            $winnersPerStore[] = Detalle::where('id_tienda', $storeId)
                ->where('resultado', 1)
                ->whereDate('fecha', $today)
                ->count();
            $losersPerStore[] = Detalle::where('id_tienda', $storeId)
                ->where('resultado', 2)
                ->whereDate('fecha', $today)
                ->count();
        }

        return compact('stores', 'winnersPerStore', 'losersPerStore');
    }

    /**
     * Obtener datos para los contadores
     *
     * @return array
     */
    private function getCountersData()
    {
        $days = MatrizDia::pluck('fecha')->toArray();
        $winnersPerDay = [];
        $remainingWinners = [];
        $winningPlays = Detalle::where('resultado', 1)->count();
        $losingPlays = Detalle::where('resultado', 2)->count();

        foreach ($days as $day) {
            $winnersPerDay[] = Detalle::whereDate('fecha', $day)->where('resultado', 1)->count();
            $remainingWinners[] = $this->calculateRemainingWinners($day);
        }

        return compact('days', 'winnersPerDay', 'remainingWinners', 'winningPlays', 'losingPlays');
    }

    /**
     * Calcular los ganadores restantes para un día dado
     *
     * @param string $day
     * @return int
     */
    private function calculateRemainingWinners($day)
    {
        $totalWinners = Parametros::where('flag', 'ganadores')->value('valor');
        $winnersSoFar = Detalle::whereDate('fecha', '<=', $day)->where('resultado', 1)->count();
        return $totalWinners - $winnersSoFar;
    }

    /**
     * Obtener datos para la actualización AJAX
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDashboardData()
    {
        // Obtener datos para el gráfico
        $chartData = $this->getChartData();

        // Obtener datos adicionales para los contadores
        $totalParticipantes = Detalle::count();
        $totalGanadores = Detalle::where('resultado', 1)->count();
        $totalPerdedores = Detalle::where('resultado', 2)->count();
        $totalGanadoresDia = Detalle::where('resultado', 1)->whereDate('fecha', Carbon::today()->format('Y-m-d'))->count();
        $totalPerdedoresDia = Detalle::where('resultado', 2)->whereDate('fecha', Carbon::today()->format('Y-m-d'))->count();

        return response()->json(array_merge($chartData, compact('totalParticipantes', 'totalGanadores', 'totalPerdedores', 'totalGanadoresDia', 'totalPerdedoresDia')));
    }
}
