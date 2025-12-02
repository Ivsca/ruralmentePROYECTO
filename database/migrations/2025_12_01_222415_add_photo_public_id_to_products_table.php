<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add nullable string column for Cloudinary public id
            // Put it after 'photo' if your DB supports it (MySQL does)
            $table->string('photo_public_id')->nullable()->after('photo');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('photo_public_id');
        });
    }
};
