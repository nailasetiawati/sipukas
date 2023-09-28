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
        $profits = $totalincome - $totalexpenses;
        if ($request->date != '') {
            $date   = explode(' - ', request()->date);
            $start  = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end    = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:00';
            $incomes = Income::whereBetween('created_at', [$start, $end])->get();
            $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
            $totalincome = Income::whereBetween('created_at', [$start, $end])->sum('nominal');
            $totalexpenses = IsExpense::whereBetween('created_at', [$start, $end])->sum('nominal');
            $profits = $totalincome - $totalexpenses;
        }
        return view('contents.report.index', compact('title', 'incomes', 'expenses', 'totalincome', 'totalexpenses', 'profits'));
    }

    public function incomeexcel(Request $request)
    {
        $start  = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end    = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $incomes = Income::whereBetween('created_at', [$start, $end])->get();
        if ($request->date != null) {
            $date   = explode(' - ', request()->date);
            $start  = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end    = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:00';
            $incomes = Income::whereBetween('created_at', [$start, $end])->get();
        }
        return view('contents.report.excel.income', compact('incomes'));
    }

    public function expenseexcel(Request $request)
    {
        dd($request);
        if ($request->date != null) {
            $date   = explode(' - ', request()->date);
            $start  = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end    = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:00';
            $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
        }
        $start  = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end    = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
        return view('contents.report.excel.expense', compact('expenses'));
    }

    public function profitexcel()
    {
    }

    public function incomepdf()
    {
        $now = Carbon::now()->format('Y-m-d');
        return view('contents.report.pdf.income', compact('now'));
    }

    public function expensepdf()
    {
        $now = Carbon::now()->format('Y-m-d');
        return view('contents.report.pdf.expense', compact('now'));
    }

    public function profitpdf()
    {
        $now = Carbon::now()->format('Y-m-d');
        return view('contents.report.pdf.profit', compact('now'));
    }

    public function incomeprint()
    {
        $now = Carbon::now()->format('Y-m-d');
        return view('contents.report.print.income', compact('now'));
    }

    public function expenseprint()
    {
        $now = Carbon::now()->format('Y-m-d');
        return view('contents.report.print.expense', compact('now'));
    }

    public function profitprint()
    {
        $now = Carbon::now()->format('Y-m-d');
        return view('contents.report.print.profit', compact('now'));
    }
}
