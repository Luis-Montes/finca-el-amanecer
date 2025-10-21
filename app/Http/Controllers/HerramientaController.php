<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    public function store(Request $request)
    {
        $eventStore = $request->input('evento_store');
        if ($eventStore == 'insert')
        {
            $herramienta = $this->create($request);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'herramienta' => $herramienta]);
            }
            return redirect()->back()->with('success', 'Herramienta agregado correctamente.');
        }
        else
        {
            $this->update($request);
            return redirect()->back()->with('success', 'Herramienta actualizado correctamente.');
        }
    }

    private function create(Request $request){
        $validated = $request->validate([
            'matricula' => 'required|unique:herramientas,matricula',
            'nombre' => 'nullable|string|max:255',
            'tipo' => 'required|string|max:255',
            'estado' => 'required|string',
            'fecha_compra' => 'nullable|date',
            'responsable' => 'required|exists:users,id',
            'observaciones' => 'nullable|string',
        ]);

        $herramienta = Herramienta::create($validated);

        return $herramienta;
    }

    private function update(Request $request)
    {
        $id = $request->input('herramienta_id');
        $herramienta = Herramienta::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'tipo' => 'required|string|max:255',
            'estado' => 'required|string',
            'fecha_compra' => 'nullable|date',
            'responsable' => 'required|exists:users,id',
            'observaciones' => 'nullable|string',
        ]);

        $herramienta->update($validated);
    }

    public function delete($id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->delete();

        return redirect()->back()->with('success', 'herramienta eliminada correctamente.');
    }
}
