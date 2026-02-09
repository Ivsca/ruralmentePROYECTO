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
        Schema::table('pedidos', function (Blueprint $table) {
            if (!Schema::hasColumn('pedidos', 'external_reference')) {
                $table->string('external_reference')->nullable()->index()->after('id');
            }

            if (!Schema::hasColumn('pedidos', 'mp_payment_id')) {
                $table->string('mp_payment_id')->nullable()->unique()->after('external_reference');
            } else {
                // Si ya existe la columna, intentamos agregar el índice único
                // Nota: Esto podría fallar si ya hay duplicados o si el índice ya existe,
                // pero es lo solicitado: "unique constraint... si ya existe columna"
                try {
                    $table->unique('mp_payment_id');
                } catch (\Throwable $e) {
                    // Ignoramos si ya existe el índice
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            if (Schema::hasColumn('pedidos', 'external_reference')) {
                $table->dropColumn('external_reference');
            }
            // No eliminamos mp_payment_id si ya existía antes, pero quitamos el unique si se agregó
            // Para simplificar en rollback de desarrollo:
            if (Schema::hasColumn('pedidos', 'mp_payment_id')) {
                 $table->dropUnique(['mp_payment_id']); // Elimina índice único
                 // $table->dropColumn('mp_payment_id'); // Opcional, depende si queremos borrar la columna
            }
        });
    }
};
