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
        Schema::create('emplt', function (Blueprint $table) {
            $table->id();
            $table->string('jours');
            $table->string('mois');
            $table->string('annee');
            $table->string('heured');
            $table->string('heuref');
            $table->foreignId('praticiens_id')->constrained('praticiens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplt');
    }
};
