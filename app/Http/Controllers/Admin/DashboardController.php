<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatrizDia;
use App\Models\MatrizTurno;
use App\Models\MatrizTienda;
use App\Models\Detalle;
use App\Models\Parametros;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $days = MatrizDia::pluck('fecha')->toArray();
        $turns = MatrizTurno::pluck('nombre')->toArray();
        $stores = MatrizTienda::pluck('nombre')->toArray();

        $winnersPerDay = [];
        $remainingWinners = [];
        $winnersPerTurn = [];
        $winnersPerStore = [];
        $winningPlays = Detalle::where('resultado', 1)->count();
        $losingPlays = Detalle::where('resultado', 2)->count();

        foreach ($days as $day) {
            $winnersPerDay[] = Detalle::whereDate('fecha', $day)->where('resultado', 1)->count();
            $remainingWinners[] = $this->calculateRemainingWinners($day);
        }

        foreach ($turns as $turn) {
            $winnersPerTurn[] = Detalle::where('turno', $turn)->where('resultado', 1)->count();
        }

        foreach ($stores as $store) {
            $winnersPerStore[] = Detalle::where('tienda', $store)->where('resultado', 1)->count();
        }

        return view('admin.dashboard', compact('days', 'winnersPerDay', 'remainingWinners', 'turns', 'winnersPerTurn', 'stores', 'winnersPerStore', 'winningPlays', 'losingPlays'));
    }

    private function calculateRemainingWinners($day)
    {
        $totalWinners = Parametros::where('flag', 'ganadores')->value('valor');
        $winnersSoFar = Detalle::whereDate('fecha', '<=', $day)->where('resultado', 1)->count();
        return $totalWinners - $winnersSoFar;
    }
}
