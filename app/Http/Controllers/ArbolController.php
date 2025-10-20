<?php

namespace App\Http\Controllers;

use App\Models\Arbol;
use Illuminate\Http\Request;

class ArbolController extends Controller
{
    public function store(Request $request)
    {
        $eventStore = $request->input('evento_store');
        if ($eventStore == 'insert')
        {
            $arbol = $this->create($request);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'animal' => $arbol]);
            }
            return redirect()->back()->with('success', 'Arbol agregado correctamente.');
        }
        else
        {
            $this->update($request);
            return redirect()->back()->with('success', 'Árbol actualizado correctamente.');
        }
    }

    private function create(Request $request){
        $validated = $request->validate([
            'matricula' => 'required|unique:arboles,matricula',
            'nombre' => 'nullable|string|max:255',
            'tipo' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'fecha_plantacion' => 'nullable|date',
            'estado' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        $arbol = Arbol::create($validated);

        return $arbol;
    }

    private function update(Request $request)
    {
        $id = $request->input('arbol_id');
        $arbol = Arbol::findOrFail($id);

        $validated = $request->validate([
            'matricula' => 'required|unique:arboles,matricula,' . $id,
            'nombre' => 'nullable|string|max:255',
            'tipo' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'fecha_plantacion' => 'nullable|date',
            'estado' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        $arbol->update($validated);
    }

    public function delete($id)
    {
        $arbol = Arbol::findOrFail($id);
        $arbol->delete();

        return redirect()->back()->with('success', 'Arbol eliminado correctamente.');
    }
}
