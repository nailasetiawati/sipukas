<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $title = "Laporan";
        return view('contents.report.index', compact('title'));
    }
}
