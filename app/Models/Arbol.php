<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arbol extends Model
{
    protected $table = 'arboles';
    
    protected $fillable = [
        'id',
        'matricula',
        'nombre',
        'tipo',
        'especie',
        'fecha_plantacion',
        'estado',
        'observaciones'
    ]; 
}
