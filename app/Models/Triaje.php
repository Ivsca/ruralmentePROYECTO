<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nombre_paciente', 'edad', 'genero',
        'riesgo_suicida', 'riesgo_autolesion', 'sintomas',
        'funcion_diaria', 'sistema_apoyo', 'urgencia', 'contexto',
        'nivel_atencion', 'recomendaciones'
    ];

    protected $casts = [
        'sintomas' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}