<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile', compact('title', 'user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required',
            'repeatNewPassword' => 'same:newPassword'
        ]);

        if ($request->newPassword == null) {
            User::where('id', $request->id)->update([
                'name'  =>  $request->name,
                'email' =>  $request->email
            ]);
        } else {
            $user = User::where('id', $request->id)->first();
            $check = Hash::check($request->oldPassword, $user->password);
            if ($check == true) {
                $user->update([
                    'name'  =>  $request->name,
                    'email' =>  $request->email,
                    'password' => Hash::make($request['newPassword'])
                ]);
            } else {
                return redirect('/profile')->with('Gagal', 'Kata sandi lama salah!');
            }
        }
        return redirect('/dashboard')->with('Berhasil', 'Akun berhasil diperbarui!');
    }
}
