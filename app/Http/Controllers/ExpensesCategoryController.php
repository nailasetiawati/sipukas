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
        $validateData = $request->validate([
            'name' => 'required|min:4'
        ]);

        ExpensesCategory::create([
            'name' => $validateData['name']
        ]);
        return redirect('/expenses-category')->with('Berhasil', 'Kategori ' . $request->name . ' Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = "Edit Kategori Pengeluaran";
        $expensesCategory   =   ExpensesCategory::where('id', $id)->get();
        return view('contents.expensescategory.edit', compact('title', 'expensesCategory'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        ExpensesCategory::where('id', $id)->update([
            'name' => $validateData['name']
        ]);
        return redirect('/expenses-category')->with('Berhasil', 'Kategori ' . $request->name . ' Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $Category = ExpensesCategory::where('id', $id)->first();
        ExpensesCategory::where('id', $id)->delete();
        return redirect('/expenses-category')->with('Berhasil', 'Kategori' . $Category->name . ' Berhasil Dihapus');
    }
}
