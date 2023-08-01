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
}
