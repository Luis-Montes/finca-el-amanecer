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
        Schema::create('arboles', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nombre')->nullable();
            $table->enum('tipo', ['Arbol Frutal', 'Arbol Ornamental', 'Parcela de Plantacion', 'Cultivo', 'Hortaliza']);
            $table->string('especie');
            $table->date('fecha_plantacion')->nullable();
            $table->enum('estado', ['Saludable', 'Enfermo', 'Talado']);
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arboles');
    }
};
