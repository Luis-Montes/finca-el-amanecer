<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login'); // tu plantilla login.blade.php
    }

    public function authenticate(Request $request)
    {
        // Validar campos
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intentar login
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate(); // Prevención de sesión fija
            return redirect()->intended('/dashboard'); // Redirige al dashboard
        }

        // Si falla
        return back()->withErrors([
            'username' => 'Usuario o contraseña incorrectos',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
