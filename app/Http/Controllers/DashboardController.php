<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        $especies = Animal::select('especie')->distinct()->pluck('especie');
        $estados  = Animal::select('estado')->distinct()->pluck('estado');

        return view('dashboard.dashboard', compact('animales', 'especies', 'estados'));


    }
}
