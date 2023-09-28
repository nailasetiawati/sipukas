<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Income;
use App\Models\IsExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $now = Carbon::now();
        $incomes = Income::whereDate('created_at', $now->format('Y-m-d'))->sum('nominal');
        $income = "Rp " . number_format($incomes, 2, ',', '.');
        $expenses = IsExpense::whereDate('created_at', $now->format('Y-m-d'))->sum('nominal');
        $expense = "Rp " . number_format($expenses, 2, ',', '.');
        $profits = $incomes - $expenses;
        $profit = "Rp " . number_format($profits, 2, ',', '.');
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $incomesYesterday = Income::whereDate('created_at', $yesterday)->sum('nominal');
        $incomeYesterday = "Rp " . number_format($incomesYesterday, 2, ',', '.');
        $expensesYesterday = IsExpense::whereDate('created_at', $yesterday)->sum('nominal');
        $expenseYesterday = "Rp " . number_format($expensesYesterday, 2, ',', '.');
        $profitsYesterday = $incomesYesterday - $expensesYesterday;
        $profitYesterday = "Rp " . number_format($profitsYesterday, 2, ',', '.');
        $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $labels = json_encode($label);
        for ($month = 1; $month < 13; $month++) {
            $incms = collect(DB::select("select nominal from incomes where month(created_at) = '$month'"))->sum('nominal');
            $totalIncms[] = $incms;
            $expns = collect(DB::select("select nominal from is_expenses where month(created_at) = '$month'"))->sum('nominal');
            $totalExpns[] = $expns;
            $totalProfits[] = $incms - $expns;
        }
        return view('contents.index', compact('title', 'income', 'expense', 'profit', 'incomeYesterday', 'expenseYesterday', 'profitYesterday', 'label', 'totalIncms', 'totalExpns', 'totalProfits'));
    }
}
