<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Solo elimina la columna si existe
        if (Schema::hasColumn('triajes', 'estado')) {
            Schema::table('triajes', function (Blueprint $table) {
                $table->dropColumn('estado');
            });
        }
    }

    public function down()
    {
        // Solo la crea si NO existe (para evitar errores al hacer rollback)
        if (!Schema::hasColumn('triajes', 'estado')) {
            Schema::table('triajes', function (Blueprint $table) {
                $table->string('estado', 50)->default('pendiente');
            });
        }
    }
};
