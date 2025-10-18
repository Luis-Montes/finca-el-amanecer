<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nombre')->nullable();
            $table->string('especie');
            $table->string('raza');
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->enum('estado', ['Activo', 'Vendido', 'Fallecido']);
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
