<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animales,id',
            'responsable' => 'required|exists:users,id',
            'tipo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'nullable',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:Programada,Completada'
        ]);

        // Obtener datos de la relación foránea
        $animal = \App\Models\Animal::find($validated['animal_id']);
        $user = \App\Models\User::find($validated['responsable']);

        // Crear registro con los datos del animal y responsable en texto
        Registro::create([
            'animal_id' => $validated['animal_id'],
            'user_id' => $validated['responsable'],
            'animal_nombre' => $animal->nombre,          // aquí guardas el nombre del animal
            'animal_matricula' => $animal->matricula,    // aquí guardas la matrícula
            'responsable_nombre' => $user->name,         // aquí guardas el nombre del usuario
            'tipo' => $validated['tipo'],
            'nombre' => $validated['nombre'],
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'descripcion' => $validated['descripcion'] ?? null,
            'estado' => $validated['estado'],
            'observaciones' => 'Sin observaciones',      // valor por default
        ]);

        return redirect()->back()->with('success', 'Registro guardado correctamente');
    }



    public function completar($id)
    {
        $reporte = Registro::findOrFail($id);
        $reporte->estado = 'Completada';
        $reporte->save();

        return redirect()->back()->with('success', 'Reporte completado correctamente');
    }

public function download()
{
    $reportes = Registro::where('estado', 'Completada')->get();
    $pdf = PDF::loadView('reports.reports', compact('reportes'));

    // Generar nombre dinámico: reportes_2025-10-21_22-45.pdf
    $filename = 'reportes_' . now()->format('Y-m-d_H-i') . '.pdf';

    return $pdf->download($filename);
}




}
