@extends('layouts.user')

@section('page-title', 'Mis Triajes')
@section('page-subtitle', 'Historial de tus evaluaciones psicológicas')

@section('content')

<div style="max-width: 1200px; margin: 0 auto;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="color: var(--gray-800); font-size: 1.5rem; font-weight: 600;">
            <i class="fas fa-clipboard-list"></i> Mis Triajes Psicológicos
        </h1>
        
        <a href="{{ route('triaje.create') }}" 
           style="padding: 0.75rem 1.5rem; background: var(--primary); color: white; border-radius: 8px; text-decoration: none; font-weight: 500;">
            <i class="fas fa-plus-circle"></i> Nuevo Triaje
        </a>
    </div>
    
    @if($triajes && $triajes->count() > 0)
        <div style="background: white; border-radius: 10px; overflow: hidden; border: 1px solid var(--gray-200);">
            @foreach($triajes as $triaje)
                <div style="padding: 1.5rem; border-bottom: 1px solid var(--gray-100);">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                        <div>
                            <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.25rem;">
                                {{ $triaje->nombre_paciente ?? 'Triaje psicológico' }}
                            </h3>
                            <div style="display: flex; gap: 1rem; font-size: 0.85rem; color: var(--gray-500);">
                                <span><i class="fas fa-calendar"></i> {{ $triaje->created_at->format('d/m/Y') }}</span>
                                <span><i class="fas fa-clock"></i> {{ $triaje->created_at->format('H:i') }}</span>
                                @if($triaje->edad)
                                    <span><i class="fas fa-user"></i> {{ $triaje->edad }} años</span>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            @if($triaje->nivel_atencion)
                                @php
                                    $badgeStyle = '';
                                    if(strpos($triaje->nivel_atencion, 'inmediata') !== false) {
                                        $badgeStyle = 'background: #fee2e2; color: #dc2626;';
                                    } elseif(strpos($triaje->nivel_atencion, 'prioritaria') !== false) {
                                        $badgeStyle = 'background: #fef3c7; color: #d97706;';
                                    } else {
                                        $badgeStyle = 'background: #d1fae5; color: #059669;';
                                    }
                                @endphp
                                <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.8rem; font-weight: 500; {{ $badgeStyle }}">
                                    {{ $triaje->nivel_atencion }}
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    @if($triaje->sintomas_principales)
                        <div style="margin-bottom: 1rem;">
                            <p style="font-weight: 500; color: var(--gray-700); margin-bottom: 0.25rem;">
                                Síntomas principales:
                            </p>
                            <p style="color: var(--gray-600); font-size: 0.9rem;">
                                {{ Str::limit($triaje->sintomas_principales, 150) }}
                            </p>
                        </div>
                    @endif
                    
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            @if($triaje->estado == 'completado')
                                <span style="color: var(--success); font-size: 0.9rem;">
                                    <i class="fas fa-check-circle"></i> Completado
                                </span>
                            @else
                                <span style="color: var(--warning); font-size: 0.9rem;">
                                    <i class="fas fa-clock"></i> Pendiente
                                </span>
                            @endif
                        </div>
                        
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('triaje.show', $triaje->id) }}" 
                               style="padding: 0.5rem 1rem; background: var(--primary); color: white; border-radius: 6px; text-decoration: none; font-size: 0.9rem;">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div style="margin-top: 2rem;">
            {{ $triajes->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 4rem 2rem; background: white; border-radius: 10px; border: 1px solid var(--gray-200);">
            <div style="width: 80px; height: 80px; background: var(--gray-100); color: var(--gray-400); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.5rem;">
                <i class="fas fa-clipboard-list"></i>
            </div>
            
            <h3 style="color: var(--gray-700); margin-bottom: 0.5rem;">No has realizado ningún triaje</h3>
            <p style="color: var(--gray-500); margin-bottom: 2rem;">Comienza evaluando tu salud mental con nuestro sistema de triaje psicológico</p>
            
            <a href="{{ route('triaje.create') }}" 
               style="padding: 0.75rem 1.5rem; background: var(--primary); color: white; border-radius: 8px; text-decoration: none; font-weight: 500; display: inline-block;">
                <i class="fas fa-plus-circle"></i> Crear Primer Triaje
            </a>
        </div>
    @endif
</div>

@endsection