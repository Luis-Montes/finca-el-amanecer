<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Mostrar formulario de login
Route::get('/', [LoginController::class, 'index'])->name('login');

// Procesar login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard protegido
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth'); // Solo accesible si está logueado



// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/animales/data', [AnimalController::class, 'getAnimals'])->name('animales.data');
Route::post('/animals/store', [AnimalController::class, 'store'])->name('animals.store');
Route::post('/empleado/store', [UserController::class, 'store'])->name('empleado.store');


Route::get('/animals/partial', function () {
    $dbOnline = true;
    $animales = Animal::all();
    $especies = $animales->pluck('especie')->unique();
    $estados = $animales->pluck('estado')->unique();

    return view('partials.animals', compact('animales', 'especies', 'estados', 'dbOnline'));
});


Route::get('/employees/partial', function () {
    $trabajadores = User::all();
    return view('partials.empleados', compact('trabajadores'));
});

//RUTA PARA ERRORES EN CONEXION CON LA DB
Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'ok']);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
});