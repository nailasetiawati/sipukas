<?php

namespace App\Http\Controllers;

use App\Models\ExpensesCategory;
use Illuminate\Http\Request;

class ExpensesCategoryController extends Controller
{
    public function index()
    {
        $title = "Kategori Pengeluaran";
        $expensesCategory =  ExpensesCategory::all();
        return view('contents.expensescategory.index', compact('title', 'expensesCategory'));
    }
    public function create()
    {
        $title = "Tambah Kategori Pengeluaran";
        return view('contents.expensescategory.create', compact('title'));
    }

    public function store(Request $request)
    {
        ExpensesCategory::create($request->all());
        return redirect('/expenses-category')->with('Berhasil', 'Kategori ' . $request->name . ' Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = "Edit Kategori Pengeluaran";
        $expensesCategory   =   ExpensesCategory::find($id);
        return view('contents.expensescategory.edit', compact('title', 'expensesCategory'));
    }
}
