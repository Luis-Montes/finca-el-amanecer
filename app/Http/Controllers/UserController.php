<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $eventStore = $request->input('evento_store');
        if ($eventStore == 'insert')
        {
            $user = $this->create($request);
            if ($request->ajax()) {
                return response()->json(['success' => true, 'employe' => $user]);
            }
            return redirect()->back()->with('success', 'Empleado agregado correctamente.');
        }
        else
        {
            $this->update($request);
            return redirect()->back()->with('success', 'Empleado actualizado correctamente.');
        }
    }

    private function create(Request $request)
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
            'password' => $request->password,
        ]);

        return $user;
    }

    private function update(Request $request)
    {
        $id = $request->input('empleado_id');
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:20',
            'rol' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $user->update($validated);
        
        return $user;
    }

    public function destroy($id)
    {
        $animal = User::findOrFail($id);
        $animal->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
}
