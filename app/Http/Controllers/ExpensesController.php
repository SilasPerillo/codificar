<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    public function searchByMonth(Request $request, $month)
    {
        if (!is_numeric($month) || $month < 1 || $month > 12) {
            abort(400, 'Invalid month. Month must be a number between 1 and 12.');
        }

        $topFiveExpenses = DB::table('expenses')
            ->join('deputies', 'deputies.id', '=', 'expenses.deputy_id')
            ->where('expenses.month', $month)
            ->orderByDesc('expenses.value')
            ->take(5)
            ->select('expenses.month', 'deputies.nome', 'expenses.value')
            ->get();

        return response()->json($topFiveExpenses);
    }

    public  function searchAllMonth(Request $request)
    {
        $aux = [];
        for ($month = 1; $month <= 12; $month++) {
            $response = $this->searchByMonth($request, $month);
            array_push($aux, $response->original);
        }
        return response()->json($aux);
    }
}
