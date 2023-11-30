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
        Schema::create('remisetuds', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
            $table->string('montant');
            $table->date('date');
            $table->longText('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remisetuds');
    }
};
