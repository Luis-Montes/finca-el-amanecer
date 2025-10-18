<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animales,id',
            'responsable' => 'required|exists:users,id',
            'tipo' => 'required|string|max:255',
            'actividad' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'nullable',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:Programada,Completada'
        ]);

        Registro::create([
            'animal_id' => $validated['animal_id'],
            'user_id' => $validated['responsable'],
            'tipo' => $validated['tipo'],
            'actividad' => $validated['actividad'],
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'descripcion' => $validated['descripcion'] ?? null,
            'estado' => $validated['estado'],
        ]);

        // dd($request->all());

        return redirect()->back()->with('success', 'Registro guardado correctamente');
    }
}
