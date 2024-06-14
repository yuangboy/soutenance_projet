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
        Schema::table('praticiens', function (Blueprint $table) {
            $table->dropColumn('sitmatrimoniale');
            $table->dropColumn('pays');
            $table->dropColumn('lieuNaiss');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('praticiens', function (Blueprint $table) {
            //
        });
    }
};