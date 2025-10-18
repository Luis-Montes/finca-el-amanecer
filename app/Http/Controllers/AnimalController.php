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
            'nombre' => 'nullable|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string',
            'estado' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        $animal = Animal::create($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'animal' => $animal]);
        }

        return redirect()->back()->with('success', 'Animal agregado correctamente.');
    }
}
