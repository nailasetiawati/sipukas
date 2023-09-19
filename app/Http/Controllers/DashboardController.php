<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\IsExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $now = Carbon::now()->format('Y-m-d');
        $incomes = Income::where('created_at', '>=', $now)->sum('nominal');
        $income = "Rp " . number_format($incomes, 2, ',', '.');
        $expenses = IsExpense::where('created_at', '>=', $now)->sum('nominal');
        $expense = "Rp " . number_format($expenses, 2, ',', '.');
        $profits = $incomes - $expenses;
        $profit = "Rp " . number_format($profits, 2, ',', '.');
        $yesterday = Carbon::now()->subDay()->format('Y-m-d');
        $incomesYesterday = Income::where('created_at', '>=', $yesterday)->sum('nominal');
        $incomeYesterday = "Rp " . number_format($incomesYesterday, 2, ',', '.');
        $expensesYesterday = IsExpense::where('created_at', '>=', $yesterday)->sum('nominal');
        $expenseYesterday = "Rp " . number_format($expensesYesterday, 2, ',', '.');
        $profitsYesterday = $incomesYesterday - $expensesYesterday;
        $profitYesterday = "Rp " . number_format($profitsYesterday, 2, ',', '.');
        return view('contents.index', compact('title', 'income', 'expense', 'profit', 'incomeYesterday', 'expenseYesterday', 'profitYesterday'));
    }
}
