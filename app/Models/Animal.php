<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    protected $table = 'animales';

    protected $fillable = [
        'id',
        'matricula',
        'nombre',
        'especie',
        'raza',
        'fecha_nacimiento',
        'sexo',
        'estado',
        'observaciones'
    ];

    public function registros()
    {
        return $this->hasMany(Registro::class);
    }

}
