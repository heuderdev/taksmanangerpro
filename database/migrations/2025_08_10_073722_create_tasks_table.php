<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /** Run the migrations. */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Dados da tarefa
            $table->string('title', 150);
            $table->text('description')->nullable();
            $table->dateTime('due_at')->nullable();

            // Status da tarefa – enum nativo (Laravel 11)
            $table->enum('status', ['pending', 'in_progress', 'completed'])
                  ->default('pending');

            // Usuário proprietário da tarefa
            $table->foreignId('user_id')
                  ->constrained()   // referencia `users.id`
                  ->cascadeOnDelete();

            $table->timestamps();

            // Índices úteis para consultas rápidas
            $table->index('user_id');
            $table->index('status');
            $table->index('due_at');
        });
    }

    /** Reverse the migrations. */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
