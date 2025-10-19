<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            // Si ya está autenticado, redirige según su rol
            if (Auth::user()->role === 'administrador') {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->role === 'trabajador') {
                return redirect()->route('trabajador.index');
            }
        }

        $response = response()->view('auth.login');
        return $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirigir según el rol
            if ($user->role === 'administrador') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'trabajador') {
                return redirect()->route('trabajador.index');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'username' => 'Tu rol no tiene acceso al sistema.',
                ]);
            }
        }

        return back()->withErrors([
            'username' => 'Usuario o contraseña incorrectos',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
