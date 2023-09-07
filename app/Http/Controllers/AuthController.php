<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $title = "Login";
        return view('contents.auth.login', compact('title'));
    }

    public function authenticated(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validateData)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('Gagal', 'Email dan Kata sandi salah, silahkan coba lagi!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
