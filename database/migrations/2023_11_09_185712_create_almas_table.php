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
        Schema::create('almas', function (Blueprint $table) {
            $table->id();
            $table->string('civilStatus');
            $table->string('scholarship');
            $table->string('occupation');
            $table->string('corregimiento');
            $table->string('zoneType');
            $table->string('distribution');
            $table->string('stratum');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_subscription');
            $table->foreign('id_category')->references('id')->on('categories');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_subscription')->references('id')->on('subscriptions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almas');
    }
};
