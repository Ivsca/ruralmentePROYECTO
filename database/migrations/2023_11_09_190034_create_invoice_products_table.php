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
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');//este es el stok del producto antes de salir a la venta
            $table->date('date');
            $table->string('subTotal');
            $table->string('total');
            $table->string('wayToPay');
            $table->string('voucher')->nullable();
            $table->string('vaucherStatus')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('id_invoice');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_invoice')->references('id')->on('invoices');
            $table->foreign('id_product')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_products');
    }
};
