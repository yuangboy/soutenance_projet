<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('dossiermedicals', function (Blueprint $table) {
            $table->id();
            $table->string('numeroDossier');
            $table->string('libelle');
            // $table->foreignId('patients_id')->constrained('patients');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('dossiermedicals');
    }
};