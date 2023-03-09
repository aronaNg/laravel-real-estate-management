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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('nom_usager');
            $table->string('nom_statut');
            $table->text('commentaire');
            $table->enum('statut', ['nouveau', 'en cours', 'rejeté', 'terminé', 'clos'])
                ->default('nouveau');
            $table->foreignId('id_biens')
                ->references('id')
                ->on('biens')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->timestamp('date_statut')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->nullable();
            $table->timestamp('date_saisie')
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
        Schema::dropIfExists('tickets');
    }
};
