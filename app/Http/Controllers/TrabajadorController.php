<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\Auth;

class TrabajadorController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Obtener el usuario logueado

        if (!$user) {
            abort(403, 'Usuario no autenticado');
        }

        $userId = $user->id;

        // Traemos solo los reportes del usuario logueado
        $reportes = Registro::where('user_id', $userId)->get();

        return view('trabajador.index', compact('reportes'));
    }

    public function completarReporte($id)
    {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'Usuario no autenticado');
        }

        $reporte = Registro::findOrFail($id);

        // Solo permitir que complete sus propios reportes
        if ($reporte->user_id != $user->id) {
            abort(403, 'No tienes permiso para completar este reporte.');
        }

        $reporte->estado = 'Completada';
        $reporte->save();

        return redirect()->back()->with('success', 'Reporte completado correctamente');
    }
}
