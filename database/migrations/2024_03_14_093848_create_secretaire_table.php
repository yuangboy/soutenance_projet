<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretaire', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nom');
            $table->string('prenom');
            $table->string('dateNaiss');
            $table->string('genre');
            $table->string('tel');
            $table->string('profession');
            $table->string('adresse');
            $table->string('matsec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secretaire');
    }
};
