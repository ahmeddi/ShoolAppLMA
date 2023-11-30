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
        Schema::create('emps', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nomfr')->nullable();
            $table->string('tel1')->unique(); 
            $table->string('post')->nullable();
            $table->string('tel2')->nullable()->unique(); 
            $table->string('nni')->nullable()->unique(); // numero nationale
            $table->string('ms')->nullable();  // montant du salaire
            $table->string('image')->nullable();
            $table->boolean('list')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emps');
    }
};
