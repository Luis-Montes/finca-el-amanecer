<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Arbol;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();

            $animales = Animal::all();
            $especies = Animal::select('especie')->distinct()->pluck('especie');
            $estados  = Animal::select('estado')->distinct()->pluck('estado');
            $arboles = Arbol::all();
            $trabajadores = User::all();
            $reportes = Registro::all();
            

            $dbOnline = true;
            $dbError = null;

            
        } catch (\Exception $e) {
            Log::error('Error de conexión con la base de datos: ' . $e->getMessage());

            $animales = collect();
            $especies = collect();
            $estados = collect();
            $trabajadores = collect();
            $reportes = collect();
            $arboles = collect();

            $dbOnline = false;
            $dbError = $e->getMessage();
        }
        return view('dashboard.dashboard', compact('animales', 'especies', 'estados', 'trabajadores', 'reportes', 'arboles', 'dbOnline', 'dbError' ));
        


    }
}
