<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // pastikan ini ada

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // ================================
        // E-1: Validasi input kosong
        // ================================
        if (!$request->email || !$request->password) {
            return back()->withErrors([
                'loginError' => 'Email dan password tidak boleh kosong', // E-1
            ]);
        }

        // Cek apakah user terdaftar
        $user = User::where('email', $request->email)->first();

        // ================================
        // E-3: Email tidak ditemukan
        // ================================
        if (!$user) {
            return back()->withErrors([
                'loginError' => 'Email dan password belum terdaftar', // E-3
            ])->withInput();
        }

        // Coba login menggunakan Auth Laravel
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // regenerate session
            $request->session()->regenerate();

            // login berhasil
            return redirect('/dashboard');
        }

        // ================================
        // E-2: Password salah
        // ================================
        return back()->withErrors([
            'loginError' => 'Email atau password salah', // E-2
        ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
