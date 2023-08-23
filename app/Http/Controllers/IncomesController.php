<?php

namespace App\Http\Controllers;

use App\Models\DonorsCategory;
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
        $categories = DonorsCategory::all();
        return view('contents.income.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nominal'  =>  'required|min:4|numeric',
            'donor_name'  =>  'required|min:4',
            'donor_category_id'  =>  'required|numeric'
        ]);

        $create = Income::create([
            'nominal'  =>  $validatedData['nominal'],
            'donor_name'  =>  $validatedData['donor_name'],
            'donor_category_id'  =>  $validatedData['donor_category_id']
        ]);

        return redirect('/incomes')->with('Berhasil', 'Dana Pemasukan ' . $request->name . ' Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = "Edit Dana Pemasukan";
        $incomes = Income::where('id', $id)->get();
        $donorscategory = DonorsCategory::all();
        return view('contents.income.Edit', compact('title', 'incomes', 'donorscategory'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nominal'           => 'required',
            'donor_name'        => 'required',
            'donor_category_id' => 'required'
        ]);
        Income::where('id', $id)->update([
            'nominal'           =>  $validatedData['nominal'],
            'donor_name'        =>  $validatedData['donor_name'],
            'donor_category_id' =>  $validatedData['donor_category_id']
        ]);
        return redirect('/incomes')->with('Berhasil', 'Dana Pemasukan ' . $request->nominal . ' Dari ' . $request->donor_name . ' Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $incomes = Income::where('id', $id)->first();
        Income::where('id', $id)->delete();

        return redirect('/incomes')->with('Berhasil', 'Dana Pemasukan Dari ' . $incomes->donor_name . ' Berhasil Dihapus!');
    }
}
