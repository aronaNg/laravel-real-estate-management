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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('commentaire');
            $table->foreignId('ticket_id')
            ->references('id')
            ->on('tickets')
            ->cascadeOnUpdate()
            ->constrained()
            ->onDelete('cascade');
            $table->timestamp('date_commentaire')
            ->default(DB::raw('CURRENT_TIMESTAMP'))
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
