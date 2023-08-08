<?php

namespace App\Http\Controllers;

use App\Models\DonorsCategory;
use Illuminate\Http\Request;

class DonorsCategoryController extends Controller
{
    public function index()
    {
        $title = "Kategori Donatur";
        $donorsCategory = DonorsCategory::all();
        return view('contents.donorscategory.index', compact('title', 'donorsCategory'));
    }

    public function create()
    {
        $title = "Tambah Kategori Donatur";
        return view('contents.donorscategory.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  =>  'required|min:4|unique:donors_categories'
        ]);

        $create = DonorsCategory::create([
            'name'  =>  $validatedData['name']
        ]);

        return redirect('/donors-category')->with('Berhasil', 'Kategori ' . $request->name . ' Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $title = "Edit Kategori Donatur";
        $donorsCategory = DonorsCategory::where('id', $id)->get();
        return view('contents.donorscategory.edit', compact('title', 'donorsCategory'));
    }
}

