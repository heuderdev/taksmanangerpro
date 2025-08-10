<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /** Run the migrations. */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();

            // Nome da tag – único para evitar duplicidade
            $table->string('name', 50)->unique();

            $table->timestamps();

            // Índice para buscas rápidas por nome
            $table->index('name');
        });
    }

    /** Reverse the migrations. */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
