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
        Schema::create('praticiens', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->string('image');
            $table->string('nom');
            $table->string('prenom');
            $table->string('dateNaiss');
            $table->string('genre');
            $table->string('tel');
            $table->string('profession');
            $table->string('adresse');
            $table->string('mattricule');
            $table->string('specialite');
            // $table->foreignId('service_id')->constrained('service');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('praticiens');
    }
};