<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function store(Request $request)
    {
        $eventStore = $request->input('evento_store');
        if ($eventStore == 'insert')
        {
            $animal = $this->create($request);
            if ($request->ajax()) {
                return response()->json(['success' => true, 'animal' => $animal]);
            }
            return redirect()->back()->with('success', 'Animal agregado correctamente.');
        }
        else
        {
            $this->update($request);
            return redirect()->back()->with('success', 'Animal actualizado correctamente.');
        }


    }

    private function create(Request $request)
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

            return $animal;
    }

    private function update(Request $request)
    {
        $id = $request->input('animal_id');
        $animal = Animal::findOrFail($id);

        $validated = $request->validate([
            'matricula' => 'required|unique:animales,matricula,' . $id,
            'nombre' => 'nullable|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'required|string',
            'estado' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        $animal->update($validated);
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->back()->with('success', 'Animal eliminado correctamente.');
    }

}
