<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $title = "Login";
        return view('contents.auth.login', compact('title'));
    }
}
