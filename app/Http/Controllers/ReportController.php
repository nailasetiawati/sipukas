<?php

namespace App\Http\Controllers;


use App\Models\Income;
use App\Models\IsExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $title = "Laporan";
        $start  = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end    = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $incomes = Income::whereBetween('created_at', [$start, $end])->get();
        $totalincome = Income::whereBetween('created_at', [$start, $end])->sum('nominal');
        $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
        $totalexpenses = IsExpense::whereBetween('created_at', [$start, $end])->sum('nominal');
        foreach ($incomes as $income)
            foreach ($expenses as $expense)
                $profits[] = array([
                    'income'    =>  $income->nominal,
                    'expense'   =>  $expense->nominal,
                    'profit'    =>  $income->nominal - $expense->nominal
                ]);
        if ($request->date != '') {
            $date   = explode(' - ', request()->date);
            $start  = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end    = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:00';
            $incomes = Income::whereBetween('created_at', [$start, $end])->get();
            $totalincome = Income::whereBetween('created_at', [$start, $end])->sum('nominal');
            $totalexpenses = IsExpense::whereBetween('created_at', [$start, $end])->sum('nominal');
            $profit = $totalincome - $totalexpenses;
        }
        return view('contents.report.index', compact('title', 'incomes', 'expenses', 'totalincome', 'totalexpenses', 'profits'));
    }
}
