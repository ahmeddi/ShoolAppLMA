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
        Schema::create('soir_jorns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mat_id')->constrained()->onDelete('cascade');
            $table->foreignId('class_id')->constrained()->onDelete('cascade');
            $table->foreignId('prof_id')->constrained()->onDelete('cascade');
            $table->foreignId('time_id')->constrained()->onDelete('cascade');

            $table->integer('day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soir_jorns');
    }
};
