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
        Schema::create('user_workshops', function (Blueprint $table) {
            $table->id();
            $table->date('dateCitations');
            $table->time('TimeCitations');
            $table->unsignedBigInteger('amountOfPeople');//aqui s define las personas que asisten a esta reunion
            $table->unsignedBigInteger('Total');
            $table->string('payMethod');
            $table->string('photoCertificacionPayment');
            $table->string('status');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_workshop');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_workshop')->references('id')->on('workshops');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_workshops');
    }
};
