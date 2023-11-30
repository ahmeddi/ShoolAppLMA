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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nomfr')->nullable();
            $table->string('sexe')->nullable();  
            $table->string('nni')->nullable()->unique();    //numero national
            $table->string('telephone');
            $table->string('whatsapp')->nullable();
            $table->string('whcode')->nullable();
            $table->string('telephone2')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
