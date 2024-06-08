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
        Schema::create('prestations', function (Blueprint $table) {
            $table->id();
             $table->string('libelle');
            $table->double('mantant');
            $table->double('cotp');
            // $table->foreignId('patients_id')->constrained('patients');
            // $table->foreignId('praticiens_id')->constrained('praticiens');
            //$table->foreignId('accouchements_id')->constrained('accouchements');
            // $table->foreignId('consultations_id')->constrained('consultations');
            // $table->foreignId('hospitalisation_id')->constrained('hospitalisation');
            // $table->foreignId('exammdics_id')->constrained('exammdics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestations');
    }
};