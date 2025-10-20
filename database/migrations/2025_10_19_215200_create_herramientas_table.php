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
        Schema::create('herramientas', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nombre')->nullable();
            $table->enum('tipo', ['Vehiculo', 'Maquina Motorizada Grande', 'Maquina Motorizada Mediana', 'Herramienta de Mano', 'Herramienta a Dos Manos']);
            $table->enum('estado', ['Operativa', 'En Reparacion', 'Extraviada', 'Fuera de Servicio']);
            $table->date('fecha_compra')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herramientas');
    }
};
