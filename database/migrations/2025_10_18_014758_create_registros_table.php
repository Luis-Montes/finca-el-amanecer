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
            $table->foreignId('animal_id')->nullable()->constrained('animales')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('animal_nombre');
            $table->string('animal_matricula');
            $table->string('responsable_nombre');
            $table->string('nombre');
            $table->enum('tipo', ['Vacuna', 'Medicamento', 'Revision Veterinaria', 'Alimentacion Especial', 'Repodruccion', 'Observacion']);
            $table->enum('estado', ['Programada', 'Completada'])->default('Programada');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('observaciones')->default('Sin observaciones');
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
