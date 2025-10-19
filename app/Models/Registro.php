<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
        'animal_id',
        'user_id', 
        'animal_nombre',       // <-- agregar
        'animal_matricula',    // <-- agregar
        'responsable_nombre',  // <-- agregar
        'nombre', 
        'estado', 
        'tipo', 
        'fecha', 
        'hora', 
        'descripcion',
        'observaciones'
    ];


    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function encargado()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
