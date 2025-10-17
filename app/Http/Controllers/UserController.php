<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|unique:users,username',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:20',
            'rol' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'username' => $request->matricula,
            'name' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'role' => $request->rol,
            'password' => $request->password, // se encripta automáticamente en el modelo
        ]);

        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }
}
