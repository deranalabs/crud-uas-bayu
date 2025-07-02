<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah email ada di database
        $user = User::where('email', $validatedData['email'])->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Email tidak ditemukan!');
        }

        // Proses autentikasi
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman utama setelah login
            return redirect()->route('dashboard');

        } else {
            return redirect()->route('login')->with('error', 'Password tidak sesuai!');
        }
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
