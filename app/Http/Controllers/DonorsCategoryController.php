<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorsCategoryController extends Controller
{
    public function index()
    {
        $title = "Kategori Donatur";
        return view('contents.donorscategory.index', compact('title'));
    }
}