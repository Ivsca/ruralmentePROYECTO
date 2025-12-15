@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Hoja de Vida - Triaje #{{ $triaje->id }}</h2>
        <div>
            <a href="{{ route('triajes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-user"></i> Información del Paciente
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $triaje->nombre_paciente }}</p>
                    <p><strong>Edad:</strong> {{ $triaje->edad }}</p>
                    <p><strong>Género:</strong> {{ $triaje->genero }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Usuario:</strong> {{ $triaje->user->name ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $triaje->user->email ?? 'N/A' }}</p>
                    <p><strong>Fecha:</strong> {{ $triaje->created_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mt-3">
        <div class="card-header bg-info text-white">
            <i class="fas fa-exclamation-triangle"></i> Evaluación de Riesgo
        </div>
        <div class="card-body">
            <p><strong>Riesgo Suicida:</strong> {{ $triaje->riesgo_suicida }}</p>
            <p><strong>Riesgo Autolesión:</strong> {{ $triaje->riesgo_autolesion }}</p>
            <p><strong>Urgencia:</strong> {{ $triaje->urgencia }}</p>
        </div>
    </div>
    
    <div class="card mt-3">
        <div class="card-header bg-warning">
            <i class="fas fa-stethoscope"></i> Síntomas Reportados
        </div>
        <div class="card-body">
            @if(!empty($triaje->sintomas))
                <ul>
                    @foreach(json_decode($triaje->sintomas, true) as $sintoma)
                        <li>{{ $sintoma }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se reportaron síntomas específicos.</p>
            @endif
            <p><strong>Función Diaria:</strong> {{ $triaje->funcion_diaria }}</p>
            <p><strong>Sistema de Apoyo:</strong> {{ $triaje->sistema_apoyo }}</p>
        </div>
    </div>
    
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            <i class="fas fa-clipboard-check"></i> Evaluación y Recomendaciones
        </div>
        <div class="card-body">
            <p><strong>Nivel de Atención:</strong> 
                <span class="badge 
                    @if($triaje->nivel_atencion == 'Atención inmediata') bg-danger
                    @elseif($triaje->nivel_atencion == 'Atención en 24-48 horas') bg-warning
                    @elseif($triaje->nivel_atencion == 'Atención prioritaria') bg-info
                    @else bg-success
                    @endif fs-6">
                    {{ $triaje->nivel_atencion }}
                </span>
            </p>
            <div>
                <strong>Recomendaciones:</strong>
                <div class="mt-2 p-3 bg-light rounded">
                    {!! nl2br(e($triaje->recomendaciones)) !!}
                </div>
            </div>
        </div>
    </div>
    
    @if($triaje->contexto)
    <div class="card mt-3">
        <div class="card-header">
            <i class="fas fa-comment"></i> Contexto Adicional
        </div>
        <div class="card-body">
            {{ $triaje->contexto }}
        </div>
    </div>
    @endif
</div>
@endsection