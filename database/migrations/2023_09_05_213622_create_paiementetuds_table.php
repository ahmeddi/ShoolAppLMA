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
        Schema::create('paiementetuds', function (Blueprint $table) {
            $table->id();
            $table->integer('motif');
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
            $table->string('mois');
            $table->string('annee');
            $table->string('montant');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiementetuds');
    }
};
