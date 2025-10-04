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
        Schema::create('alma_characterizations', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->unsignedBigInteger('id_alma');
            $table->unsignedBigInteger('id_characterization');
            $table->foreign('id_alma')->references('id')->on('almas');
            $table->foreign('id_characterization')->references('id')->on('characterizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alma_characterizations');
    }
};
