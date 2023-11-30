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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nomfr')->nullable();;
            $table->string('sexe');  
            $table->string('nni')->nullable()->unique();            //numero national
            $table->string('nc')->nullable()->unique();             // numero de scolarité
            $table->date('ddn')->nullable();                        // date de naissance 
            $table->string('image')->nullable();
            $table->integer('nb')->nullable();
            $table->boolean('list')->nullable();
            $table->foreignId('classe_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_id')->constrained()->onDelete('cascade');
            $table->boolean('soir')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
