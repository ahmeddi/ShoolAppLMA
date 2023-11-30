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
        Schema::create('attds_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classe_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('time');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attds_classes');
    }
};
