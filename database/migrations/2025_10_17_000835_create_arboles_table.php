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
            $table->enum('tipo', ['Árbol Frutal', 'Árbol Ornamental', 'Parcela de pantación', 'Cultivo', 'Hortaliza']);
            $table->string('especie');
            $table->date('fecha_plantacion');
            $table->enum('estado', ['Saludable', 'Enfermo', 'Talado', 'Cosechado']);
            $table->string('ubicacion');
            $table->string('observaciones');
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
