<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomesController extends Controller
{
    public function index()
    {
        $title = "Dana Pemasukan";
        $incomes = Income::all();
        return view('contents.income.index', compact('title', 'incomes'));
    }

    public function create()
    {
        $title = "Tambah Dana Pemasukan";
        return view('contents.income.create', compact('title'));
    }


    public function edit()
    {
        $title = "Edit Dana Pemasukan";
        return view('contents.income.Edit', compact('title'));
    }
}
