<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /** Run the migrations. */
    public function up(): void
    {
        Schema::create('tag_task', function (Blueprint $table) {
            // Relaciona a tarefa
            $table->foreignId('task_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Relaciona a tag
            $table->foreignId('tag_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Chave primária composta (garante unicidade da relação)
            $table->primary(['task_id', 'tag_id']);

            // Índice apenas por tag (útil para buscar "todas as tarefas da tag X")
            $table->index('tag_id');
        });
    }

    /** Reverse the migrations. */
    public function down(): void
    {
        Schema::dropIfExists('tag_task');
    }
};
