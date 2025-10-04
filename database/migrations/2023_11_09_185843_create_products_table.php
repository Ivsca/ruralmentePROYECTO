<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('contentProductDescription');
            $table->unsignedBigInteger('price');
            // este es el estok del producto, hacer que se pueda modificar cada vez que realicen una compra
            $table->unsignedBigInteger('stock');
            $table->string('photo');
            $table->string('color');
            $table->string('categoryProduct');
            $table->string('status');
            // $table->unsignedBigInteger('categories_id')->unsigned()->nullable();
            // $table->foreign('categories_id')->references('id')->on('category_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
