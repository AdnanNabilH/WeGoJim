<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman daftar
    public function showRegister()
    {
        return view('daftar');
    }

    // Proses pendaftaran
   public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // Default role 'user'
    ]);

    return redirect()->route('login.form')->with('success', 'Pendaftaran berhasil! Silakan login.');
}


    // Tampilkan halaman login
    public function showLogin()
    {
        return view('masuk');
    }

    // Proses login
 // Proses login
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        
        // Cek apakah user adalah admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.course'); // <- diperbaiki agar sesuai dengan nama route
        }

        return redirect()->route('user.index');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}


    // Logout
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form')->with('logout', 'Berhasil keluar dari akun.');
}



}

