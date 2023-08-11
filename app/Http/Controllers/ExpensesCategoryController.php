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
    public function create()
    {
        $title = "Tambah Kategori Pengeluaran";
        return view('contents.expensescategory.create', compact('title'));
    }
    public function edit()
    {
        $title = "Edit Kategori Pengeluaran";
        return view('contents.expensescategory.edit', compact('title'));
    }
}
