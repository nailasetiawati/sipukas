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

    public function profitexcel(Request $request)
    {
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
        return view('contents.report.excel.profit', compact('profits', 'totalincome', 'totalexpenses'));
    }

    public function incomepdf(\Codedge\Fpdf\Fpdf\Fpdf $pdf, Request $request)
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
        $pdf->AddPage();

        $pdf->SetFont('Times', 'B', 13);
        if ($request->date == null) {
            $date = Carbon::now()->format('Y-m-d');
            $pdf->Cell(200, 10, "DATA DANA PEMASUKAN ($date)", 0, 0, 'C');
        } else {
            $date = explode(' - ', $request->date);
            $pdf->Cell(200, 10, "DATA DANA PEMASUKAN ($date[0] - $date[1])", 0, 0, 'C');
        }
        $pdf->Cell(10, 15, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(10, 7, 'NO', 1, 0, 'C');
        $pdf->Cell(50, 7, 'NAMA DONATUR', 1, 0, 'C');
        $pdf->Cell(75, 7, 'KATEGORI DONATUR', 1, 0, 'C');
        $pdf->Cell(55, 7, 'NOMINAL', 1, 0, 'C');


        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', '', 10);
        $no = 1;
        foreach ($incomes as $data) {
            $pdf->Cell(10, 6, $no++, 1, 0, 'C');
            $pdf->Cell(50, 6, $data->donor_name, 1, 0);
            $pdf->Cell(75, 6, $data->DonorsCategory->name, 1, 0);
            $pdf->Cell(55, 6, "Rp " . number_format($data->nominal, 2, ',', '.'), 1, 1);
        }


        $pdf->Output();
        exit;
    }

    public function expensepdf(\Codedge\Fpdf\Fpdf\Fpdf $pdf, Request $request)
    {
        if ($request->date != null) {
            $date   = explode(' - ', request()->date);
            $start  = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end    = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:00';
            $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
        }
        $start  = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end    = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
        $pdf->AddPage();

        $pdf->SetFont('Times', 'B', 13);
        if ($request->date == null) {
            $date = Carbon::now()->format('Y-m-d');
            $pdf->Cell(200, 10, "DATA DANA PENGELUARAN ($date)", 0, 0, 'C');
        } else {
            $date = explode(' - ', $request->date);
            $pdf->Cell(200, 10, "DATA DANA PENGELUARAN ($date[0] - $date[1])", 0, 0, 'C');
        }

        $pdf->Cell(10, 15, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(10, 7, 'NO', 1, 0, 'C');
        $pdf->Cell(50, 7, 'KATEGORI PENGELUARAN', 1, 0, 'C');
        $pdf->Cell(75, 7, 'DESKRIPSI', 1, 0, 'C');
        $pdf->Cell(55, 7, 'NOMINAL', 1, 0, 'C');


        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', '', 10);
        $no = 1;
        foreach ($expenses as $data) {
            $pdf->Cell(10, 6, $no++, 1, 0, 'C');
            $pdf->Cell(50, 6, $data->ExpenseCategory->name, 1, 0);
            $pdf->Cell(75, 6, $data->description, 1, 0);
            $pdf->Cell(55, 6, "Rp " . number_format($data->nominal, 2, ',', '.'), 1, 1);
        }


        $pdf->Output();
        exit;
    }

    public function profitpdf(\Codedge\Fpdf\Fpdf\Fpdf $pdf, Request $request)
    {
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
        $pdf->AddPage();

        $pdf->SetFont('Times', 'B', 13);
        if ($request->date == null) {
            $date = Carbon::now()->format('Y-m-d');
            $pdf->Cell(200, 10, "DATA SELISIH ($date)", 0, 0, 'C');
        } else {
            $date = explode(' - ', $request->date);
            $pdf->Cell(200, 10, "DATA SELISIH ($date[0] - $date[1])", 0, 0, 'C');
        }

        $pdf->Cell(10, 15, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(10, 7, 'NO', 1, 0, 'C');
        $pdf->Cell(50, 7, 'DANA PEMASUKAN', 1, 0, 'C');
        $pdf->Cell(75, 7, 'DANA PENGELUARAN', 1, 0, 'C');
        $pdf->Cell(55, 7, 'TOTAL', 1, 0, 'C');


        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', '', 10);
        $no = 1;
        $pdf->Cell(10, 6, $no, 1, 0, 'C');
        $pdf->Cell(50, 6, "Rp " . number_format($totalincome, 2, ',', '.'), 1, 0);
        $pdf->Cell(75, 6, "Rp " . number_format($totalexpenses, 2, ',', '.'), 1, 0);
        $pdf->Cell(55, 6, "Rp " . number_format($profits, 2, ',', '.'), 1, 1);

        $pdf->Output();
        exit;
    }

    public function incomeprint(Request $request)
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
        return view('contents.report.print.income', compact('incomes'));
    }

    public function expenseprint(Request $request)
    {
        if ($request->date != null) {
            $date   = explode(' - ', request()->date);
            $start  = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end    = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:00';
            $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
        }
        $start  = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end    = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $expenses = IsExpense::whereBetween('created_at', [$start, $end])->get();
        return view('contents.report.print.expense', compact('expenses'));
    }

    public function profitprint(Request $request)
    {
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
        return view('contents.report.print.profit', compact('profits', 'totalincome', 'totalexpenses'));
    }
}
