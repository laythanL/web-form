<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'staf') {
                return redirect('/staf/dashboard');
            }

            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Akses hanya untuk admin dan staf.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email salah.',
            'password' => 'password salah '
        ])->withInput();

    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register (tanpa input role dari form)
    public function register(Request $request)
    {
        // Validasi data input


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ]);

        // Simpan user baru dengan role default "user"
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staf', // role default
        ]);

        // Login otomatis
        Auth::login($user);

        return redirect('/dashboard'); // semua user baru ke dashboard biasa
    }
}
