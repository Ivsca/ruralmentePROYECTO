<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('triajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nombre_paciente');
            $table->unsignedTinyInteger('edad');
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('riesgo_suicida');
            $table->string('riesgo_autolesion');
            $table->json('sintomas')->nullable();
            $table->string('funcion_diaria');
            $table->string('sistema_apoyo');
            $table->string('urgencia');
            $table->text('contexto')->nullable();
            $table->string('nivel_atencion')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index('user_id');
            $table->index('nivel_atencion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('triajes');
    }
};