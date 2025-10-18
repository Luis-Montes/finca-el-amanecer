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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animales')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('actividad');
            $table->enum('tipo', ['Vacuna', 'Medicamento', 'Revision Veterinaria', 'Alimentacion Especial', 'Repodruccion', 'Observacion']);
            $table->enum('estado', ['Programada', 'Completada'])->default('Programada');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
