<?php

namespace App\Http\Controllers;

use App\Models\DonorsCategory;
use Illuminate\Http\Request;
use Alert;
use App\Models\Income;

class DonorsCategoryController extends Controller
{
    public function index()
    {
        $title = "Kategori Donatur";
        $swal_title = 'Hapus Kategori!';
        $swal_text  = 'Apakah anda yakin ingin menghapus kategori ini?';
        $donorsCategory = DonorsCategory::all();
        confirmDelete($swal_title, $swal_text);
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'  =>  'required|min:4'
        ]);

        $update = DonorsCategory::where('id', $id)->update([
            'name'  =>  $validatedData['name']
        ]);

        return redirect('/donors-category')->with('Berhasil', 'Kategori ' . $request->name . ' Berhasil Diperbarui!');
    }

    public function delete($id)
    {
        $income = Income::where('donor_category_id', $id)->get();

        if ($income->count() > 0) {
            return redirect('/donors-category')->with('Gagal', 'Kategori ini masih digunakan untuk data dana pemasukan!');
        } else {
            $category = DonorsCategory::where('id', $id)->first();
            DonorsCategory::where('id', $id)->delete();
            return redirect('/donors-category')->with('Berhasil', 'Kategori ' . $category->name . ' Berhasil Dihapus!');
        }
    }
}
