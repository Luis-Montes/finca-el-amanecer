<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matricula' => 'required|unique:animales,matricula',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string',
            'estado' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        $animal = Animal::create($validated);

        // 👉 Si la petición viene desde fetch(), respondemos con JSON
        if ($request->ajax()) {
            return response()->json(['success' => true, 'animal' => $animal]);
        }

        // 🚪 Si es una petición normal, redirige (comportamiento clásico)
        return redirect()->back()->with('success', 'Animal agregado correctamente.');
    }
}
