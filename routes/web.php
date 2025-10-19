<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\NoCache;
use App\Models\Animal;
use App\Models\User;
use App\Models\Registro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

// Página principal (login)
Route::get('/', [LoginController::class, 'index'])->name('login');

// Procesar login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Verificar conexión a base de datos (útil para AJAX)
Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'ok']);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
});

// Página de error de acceso denegado
Route::get('/acceso-denegado', function () {
    return view('errors.acceso-denegado');
})->name('acceso.denegado');


/*
|--------------------------------------------------------------------------
| RUTAS PARA ADMINISTRADORES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:administrador', NoCache::class])->group(function () {

    // Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Animales
    Route::get('/animales/data', [AnimalController::class, 'getAnimals'])->name('animales.data');
    Route::post('/animals/store', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/partial', function () {
        $dbOnline = true;
        $animales = Animal::all();
        $especies = $animales->pluck('especie')->unique();
        $estados = $animales->pluck('estado')->unique();

        return view('partials.animals', compact('animales', 'especies', 'estados', 'dbOnline'));
    });
    Route::put('/animals/{id}', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animals/{id}', [AnimalController::class, 'destroy'])->name('animals.destroy');

    // Empleados
    Route::post('/empleado/store', [UserController::class, 'store'])->name('empleado.store');
    Route::get('/employees/partial', function () {
        $trabajadores = User::all();
        return view('partials.empleados', compact('trabajadores'));
    });

    // Registros e historial
    Route::get('/reports/partial', function () {
        $reportes = Registro::all();
        return view('partials.reports', compact('reportes'));
    });
    Route::post('/registro/store', [RegistroController::class, 'store'])->name('registro.store');
    Route::patch('/reportes/{id}/completar', [RegistroController::class, 'completar'])->name('reportes.completar');
});


/*
|--------------------------------------------------------------------------
| RUTAS PARA TRABAJADORES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:trabajador', NoCache::class])->group(function () {
    Route::get('/trabajador', [TrabajadorController::class, 'index'])->name('trabajador.index');
    Route::patch('/trabajador/reportes/{id}/completar', [TrabajadorController::class, 'completarReporte'])
        ->name('trabajador.reportes.completar');
});
