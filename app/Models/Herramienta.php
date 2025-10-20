<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    protected $table = 'herramientas';

    protected $fillable = [
        'id',
        'matricula',
        'nombre',
        'tipo',
        'estado',
        'fecha_compra',
        'user_id',
        'observaciones'
    ];
}
