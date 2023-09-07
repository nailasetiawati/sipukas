<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Models\IsExpense;

class ExpensesCategoryController extends Controller
{
    public function index()
    {
        $title = "Kategori Pengeluaran";
        $expensesCategory =  ExpenseCategory::all();
        return view('contents.expensescategory.index', compact('title', 'expensesCategory'));
    }
    public function create()
    {
        $title = "Tambah Kategori Pengeluaran";
        return view('contents.expensescategory.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:4'
        ]);

        ExpenseCategory::create([
            'name' => $validateData['name']
        ]);
        return redirect('/expenses-category')->with('Berhasil', 'Kategori ' . $request->name . ' Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = "Edit Kategori Pengeluaran";
        $expensesCategory   =   ExpenseCategory::where('id', $id)->get();
        return view('contents.expensescategory.edit', compact('title', 'expensesCategory'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        ExpenseCategory::where('id', $id)->update([
            'name' => $validateData['name']
        ]);
        return redirect('/expenses-category')->with('Berhasil', 'Kategori ' . $request->name . ' Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $isexpense = IsExpense::where('expense_category_id', $id)->get();
        if ($isexpense->count() > 0) {
            return redirect('/expenses-category')->with('Gagal', 'Kategori ini masih digunakan!');
        } else {
            $Category = ExpenseCategory::where('id', $id)->first();
            ExpenseCategory::where('id', $id)->delete();
            return redirect('/expenses-category')->with('Berhasil', 'Kategori' . $Category->name . ' Berhasil Dihapus');
        }
    }
}
