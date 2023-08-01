<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesCategoryController extends Controller
{
    public function index()
    {
        $title = "Kategori Pengeluaran";
        return view('contents.expensescategory.index', compact('title'));
    }
}
