<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\NoCache;
use App\Models\Registro;

// RUTAS PÚBLICAS
//Mostrar formulario de login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    $response = response()->view('auth.login');
    return $response->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                    ->header('Pragma','no-cache')
                    ->header('Expires','Sat, 01 Jan 1990 00:00:00 GMT');
})->name('login');

//Procesar login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

//Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

//Errores de conexion en la base de datos
Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'ok']);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
});


//Rutas protegidas
Route::middleware(['auth', NoCache::class])->group(function () {

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Animales
    Route::get('/animales/data', [AnimalController::class, 'getAnimals'])->name('animales.data');
    Route::post('/animals/store', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/partial', function () {
        $dbOnline = true;
        $animales = Animal::all();
        $especies = $animales->pluck('especie')->unique();
        $estados = $animales->pluck('estado')->unique();

        return view('partials.animals', compact('animales', 'especies', 'estados', 'dbOnline'));
    });

    //Empleados
    Route::post('/empleado/store', [UserController::class, 'store'])->name('empleado.store');
    Route::get('/employees/partial', function () {
        $trabajadores = User::all();
        return view('partials.empleados', compact('trabajadores'));
    });



    //Registros e Historial de los animales
    Route::get('/reports/partial', function () {
        $reportes = Registro::all();
        return view('partials.reports', compact('reportes'));
    });
    Route::post('/registro/store', [RegistroController::class, 'store'])->name('registro.store')->middleware('auth');


});
