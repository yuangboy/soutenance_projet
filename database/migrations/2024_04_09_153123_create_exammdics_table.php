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
        Schema::create('exammdics', function (Blueprint $table) {
            $table->id();
            $table->string('dateprescription');
            $table->string('libelle');
            // $table->foreignId('consultations_id')->constrained('consultations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exammdics');
    }
};