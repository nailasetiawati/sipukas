<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomesController extends Controller
{
    public function index()
    {
        $title = "Dana Pemasukan";
        return view('contents.income.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Dana Pemasukan";
        return view('contents.income.create', compact('title'));
    }

    public function edit()
    {
        $title = "Edit Dana Pemasukan";
        return view('contents.income.Edit', compact('title'));
    }
}
