<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('consultation_requests', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('patiens_id');
            // $table->unsignedBigInteger('praticiens_id');
            $table->text('details');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            // $table->foreign('patiens_id')->references('id')->on('patiens')->onDelete('cascade');
            // $table->foreign('praticiens_id')->references('id')->on('praticiens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultation_requests');
    }
}