@extends('layouts.admin')

@section('page-title', 'Detalles del Triaje')
@section('page-subtitle', 'Información completa del triaje psicológico')

@section('content')

<div style="max-width: 900px; margin: 0 auto;">

    <!-- HEADER -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="color: var(--gray-800); font-size: 1.5rem; font-weight: 600;">
            <i class="fas fa-file-medical-alt"></i> Detalles del Triaje
        </h1>

        <a href="{{ route('admin.triajes.index') }}"
           style="padding: 0.75rem 1.5rem; background: var(--primary); color: white; border-radius: 8px; text-decoration: none; font-weight: 500;">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <!-- CARD PRINCIPAL -->
    <div style="background: white; border-radius: 12px; padding: 2rem; border: 1px solid var(--gray-200);">

        <!-- TITULO + BADGE -->
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1.5rem;">
            <div>
                <h2 style="font-size: 1.4rem; font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;">
                    {{ $triaje->nombre_paciente ?? 'Triaje psicológico' }}
                </h2>

                <div style="display: flex; gap: 1rem; font-size: 0.9rem; color: var(--gray-500);">
                    <span><i class="fas fa-calendar"></i> {{ $triaje->created_at->format('d/m/Y') }}</span>
                    <span><i class="fas fa-clock"></i> {{ $triaje->created_at->format('H:i') }}</span>

                    @if($triaje->edad)
                        <span><i class="fas fa-user"></i> {{ $triaje->edad }} años</span>
                    @endif

                    <span><i class="fas fa-user-shield"></i> Usuario: {{ $triaje->user->name ?? 'N/A' }}</span>
                </div>
            </div>

            <!-- BADGE NIVEL ATENCIÓN -->
            <div>
                @php
                    if(strpos($triaje->nivel_atencion, 'inmediata') !== false) {
                        $badgeStyle = 'background: #fee2e2; color: #dc2626;';
                    } elseif(strpos($triaje->nivel_atencion, 'prioritaria') !== false) {
                        $badgeStyle = 'background: #fef3c7; color: #d97706;';
                    } else {
                        $badgeStyle = 'background: #d1fae5; color: #059669;';
                    }
                @endphp

                <span style="display: inline-block; padding: 0.35rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; {{ $badgeStyle }}">
                    {{ $triaje->nivel_atencion }}
                </span>
            </div>
        </div>

        <!-- ESTADO -->
        <div style="margin-bottom: 1.5rem;">
            <p style="font-size: 0.95rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.25rem;">Estado:</p>

            @if($triaje->estado == 'completado')
                <span style="color: var(--success); font-size: 0.95rem;">
                    <i class="fas fa-check-circle"></i> Completado
                </span>
            @else
                <span style="color: var(--warning); font-size: 0.95rem;">
                    <i class="fas fa-clock"></i> Pendiente
                </span>
            @endif
        </div>

        <!-- SINTOMAS -->
        @if($triaje->sintomas_principales)
            <div style="margin-bottom: 1.5rem;">
                <p style="font-size: 0.95rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.25rem;">
                    Síntomas principales:
                </p>
                <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.5;">
                    {{ $triaje->sintomas_principales }}
                </p>
            </div>
        @endif

        <!-- DESCRIPCIÓN COMPLETA / NOTAS -->
        @if($triaje->descripcion)
            <div style="margin-bottom: 1.5rem;">
                <p style="font-size: 0.95rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.25rem;">
                    Notas adicionales:
                </p>
                <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.6;">
                    {{ $triaje->descripcion }}
                </p>
            </div>
        @endif

        <!-- DATOS ADICIONALES DEL ADMIN -->
        <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
            <p style="font-size: 0.9rem; color: var(--gray-500);">
                <i class="fas fa-info-circle"></i>
                Registro ID: {{ $triaje->id }}
            </p>
        </div>

    </div>

</div>

@endsection
