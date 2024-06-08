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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('heure');
            $table->string('motif');
            $table->double('poids');
            $table->double('temperature');
            $table->string('TAD');
            $table->string('TAS');
            // $table->foreignId('rendezvous_id')->constrained('rendezvous');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};