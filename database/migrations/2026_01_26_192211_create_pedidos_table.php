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
        Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();

        $table->string('estado', 30)->default('pendiente'); 
        // pendiente | pagado | enviado | cancelado | completado

        $table->string('moneda', 10)->default('COP');

        $table->unsignedBigInteger('subtotal_centavos')->default(0);
        $table->unsignedBigInteger('envio_centavos')->default(0);
        $table->unsignedBigInteger('total_centavos')->default(0);

        $table->string('cliente_nombre')->nullable();
        $table->string('cliente_email')->nullable();
        $table->string('cliente_telefono')->nullable();
        $table->text('direccion_envio')->nullable();
        $table->text('notas')->nullable();

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
