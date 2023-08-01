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
}
