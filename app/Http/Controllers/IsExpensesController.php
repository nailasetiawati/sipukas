<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\IsExpense;
use Illuminate\Http\Request;

class IsExpensesController extends Controller
{
    public function index()
    {
        $title = "Dana Pengeluaran";
        $expenses = IsExpense::all();
        // dd($expenses);
        return view('contents.isexpenses.index', compact('title', 'expenses'));
    }

    public function create()
    {
        $title = "Tambah Dana Pengeluaran";
        $categories = ExpenseCategory::get();
        return view('contents.isexpenses.create', compact('title', "categories"));
    }

    public function store(Request $request)
    {
        $category = ExpenseCategory::where('id', $request->expense_category_id)->first();
        $validateData = $request->validate([
            'nominal' => 'required',
            'expense_category_id' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $image = $request->file('image');
        $image->move(base_path('public\img\expense-image'), $image->getClientOriginalName());

        IsExpense::create([
            'nominal' => $validateData['nominal'],
            'expense_category_id' => $validateData['expense_category_id'],
            'description' => $validateData['description'],
            'image' => $image->getClientOriginalName()
        ]);
        return redirect('/isexpense')->with('Berhasil', 'Dana Pengeluaran ' . $request->nominal . ' untuk ' . $category->name . ' Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = "Edit Dana Pengeluaran";
        $expenses = IsExpense::where('id', $id)->get();
        $categories = ExpenseCategory::get();
        return view('contents.isexpenses.edit', compact('title', 'categories', 'expenses'));
    }

    public function update(Request $request, $id)
    {
        $category = ExpenseCategory::where('id', $request->expense_category_id)->first();
        dd($category->name);
        $validateData = $request->validate([
            'nominal' => 'required',
            'expense_category_id' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $image->move(base_path('public\img\expense-image'), $image->getClientOriginalName());

            IsExpense::where('id', $id)->update([
                'nominal' => $validateData['nominal'],
                'expense_category_id' => $validateData['expense_category_id'],
                'description' => $validateData['description'],
                'image' => $image->getClientOriginalName()
            ]);
        } else {
            IsExpense::where('id', $id)->update([
                'nominal' => $validateData['nominal'],
                'expense_category_id' => $validateData['expense_category_id'],
                'description' => $validateData['description']
            ]);
        }
        return redirect('/isexpense')->with('Berhasil', 'Dana Pengeluaran ' . $request->nominal . ' untuk ' . $category->name . ' Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $expense = IsExpense::where('id', $id)->first();
        IsExpense::where('id', $id)->delete();
        return redirect('/isexpense')->with('Berhasil', 'Dana Pengeluaran ' . $expense->nominal . ' untuk ' . $expense->ExpenseCategory->name . ' Berhasil Dihapus!');
    }
}
