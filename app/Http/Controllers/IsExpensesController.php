<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IsExpensesController extends Controller
{
    public function index()
    {
        $title = "Dana Pengeluaran";
        return view('contents.isexpenses.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Dana Pengeluaran";
        return view('contents.isexpenses.edit', compact('title'));
    }

    public function edit()
    {
        $title = "Edit Dana Pengeluaran";
        return view('contents.isexpenses.edit', compact('title'));
    }
}
