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
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->string('another_detail');
            $table->string('total');
            $table->string('subTotal');
            $table->unsignedBigInteger('detail_invoices_id');
            $table->foreign('detail_invoices_id')->references('id')->on('invoice_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pays');
    }
};
