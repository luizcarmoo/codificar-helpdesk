<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            // Título resumido do chamado
            $table->string('title');

            // Descrição detalhada
            $table->text('description');

            // Prioridade do chamado
            $table->string('priority');

            // Situação atual
            $table->string('status');

            // Responsável atribuído
            $table->foreignId('responsible_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};