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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('dateNaiss');
            $table->string('genre');
            $table->string('tel');
            $table->string('profession');
            $table->string('adresse');
            // $table->foreignId('praticiens_id')->constrained('praticiens');
            // $table->foreignId('patients_id')->constrained('patients');
            // $table->foreignId('secretaire_id')->constrained('secretaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};