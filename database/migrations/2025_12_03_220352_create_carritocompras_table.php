<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carritocompras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->text('productos_ids')->nullable();
            $table->integer('CantidadProductos')->default(0);
            $table->boolean('seleccionado')->default(false);
            $table->timestamps();

            // Si NO tienes tabla users, comenta o elimina la línea siguiente
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carritocompras');
    }
};
