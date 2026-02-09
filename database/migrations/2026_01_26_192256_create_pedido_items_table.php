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
        Schema::create('pedido_items', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pedido_id')
            ->constrained('pedidos')
            ->cascadeOnDelete();

        $table->foreignId('product_id')
            ->constrained('products')
            ->restrictOnDelete();

        $table->string('color')->nullable();
        $table->string('talla')->nullable();

        $table->unsignedInteger('cantidad');

        $table->unsignedBigInteger('precio_unitario_centavos');
        $table->unsignedBigInteger('total_linea_centavos');

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_items');
    }
};
