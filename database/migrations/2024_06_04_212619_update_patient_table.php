<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('codep');
            $table->string('matricule', 255)->nullable(); // Adjust the type and attributes as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('codep')->nullable(); // Adjust the type and attributes as needed
            $table->dropColumn('matricule');
        });
    }
};
