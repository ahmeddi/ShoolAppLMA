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
        Schema::create('profs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nomfr')->nullable();
            $table->string('tel1')->unique(); 
            $table->string('tel2')->nullable(); 
            $table->string('nni')->nullable()->unique(); // numero nationale
            $table->longText('diplom')->nullable();   
            $table->string('se')->nullable();   // Autorisation d'enseignement 
            $table->string('ts')->nullable();  //type de salaire 
            $table->string('ms')->nullable();  // montant du salaire
            $table->string('image')->nullable();
            $table->boolean('list')->default(1);
            $table->boolean('jardin')->default(0);
            $table->boolean('primaire')->default(0);
            $table->boolean('lycee')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profs');
    }
};
