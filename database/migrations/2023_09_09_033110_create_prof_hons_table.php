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
        Schema::create('prof_hons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prof_id')->nullable()->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('heurs');
            $table->string('mois');
            $table->string('annee');
            $table->string('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_hons');
    }
};
