@extends('layouts.user')

@section('page-title', 'Mis Triajes')
@section('page-subtitle', 'Historial de tus evaluaciones psicológicas')

@push('styles')
<style>
    .triajes-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid rgba(46, 139, 87, 0.1);
    }
    
    .page-title-container h1 {
        color: var(--text-primary);
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .page-title-container h1 i {
        color: var(--primary-green);
        font-size: 1.6rem;
    }
    
    .page-subtitle {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-top: 0.25rem;
    }
    
    .new-triage-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.85rem 1.75rem;
        background: var(--green-gradient);
        color: white;
        border-radius: var(--radius-full);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: var(--transition-smooth);
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.2);
    }
    
    .new-triage-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(46, 139, 87, 0.3);
        color: white;
    }
    
    /* Lista de triajes */
    .triajes-list-container {
        background: var(--bg-card);
        border-radius: var(--card-radius);
        overflow: hidden;
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
    }
    
    .triaje-item {
        padding: 1.75rem;
        border-bottom: 1px solid rgba(46, 139, 87, 0.08);
        transition: var(--transition-smooth);
        position: relative;
    }
    
    .triaje-item:hover {
        background: linear-gradient(90deg, rgba(46, 139, 87, 0.02) 0%, rgba(255, 255, 255, 1) 100%);
        transform: translateX(5px);
    }
    
    .triaje-item:last-child {
        border-bottom: none;
    }
    
    .triaje-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.25rem;
    }
    
    .triaje-info h3 {
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }
    
    .triaje-meta {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        font-size: 0.9rem;
        color: var(--text-light);
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .meta-item i {
        color: var(--primary-green);
        font-size: 0.9rem;
    }
    
    /* Badge de nivel */
    .triage-level-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        border-radius: var(--radius-full);
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    
    .badge-inmediata { 
        background: linear-gradient(135deg, #FCA5A5 0%, #EF4444 100%); 
        color: white; 
    }
    
    .badge-prioritaria { 
        background: linear-gradient(135deg, #FCD34D 0%, #F59E0B 100%); 
        color: white; 
    }
    
    .badge-rutinaria { 
        background: linear-gradient(135deg, #86EFAC 0%, #10B981 100%); 
        color: white; 
    }
    
    /* Síntomas */
    .symptoms-section {
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: rgba(46, 139, 87, 0.03);
        border-radius: var(--radius-md);
        border-left: 4px solid var(--primary-green);
    }
    
    .symptoms-title {
        font-weight: 600;
        color: var(--primary-green);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .symptoms-content {
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    /* Acciones */
    .triaje-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .action-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.25rem;
        border-radius: var(--radius-full);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: var(--transition-smooth);
    }
    
    .btn-primary {
        background: var(--green-gradient);
        color: white;
        box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(46, 139, 87, 0.3);
        color: white;
    }
    
    .btn-secondary {
        background: var(--bg-card);
        color: var(--primary-green);
        border: 1px solid rgba(46, 139, 87, 0.2);
    }
    
    .btn-secondary:hover {
        background: rgba(46, 139, 87, 0.1);
        border-color: var(--primary-green);
        transform: translateY(-2px);
    }
    
    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: var(--bg-card);
        border-radius: var(--card-radius);
        border: 2px dashed rgba(46, 139, 87, 0.2);
        transition: var(--transition-smooth);
    }
    
    .empty-state:hover {
        border-color: rgba(46, 139, 87, 0.3);
        transform: translateY(-2px);
    }
    
    .empty-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(46, 139, 87, 0.05) 100%);
        color: var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
        box-shadow: 0 8px 20px rgba(46, 139, 87, 0.1);
    }
    
    .empty-state h3 {
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        font-size: 1.4rem;
        font-weight: 600;
    }
    
    .empty-state p {
        color: var(--text-light);
        margin-bottom: 2rem;
        font-size: 0.95rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Paginación */
    .pagination-container {
        margin-top: 2.5rem;
        padding: 1.5rem;
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .pagination li {
        margin: 0 0.25rem;
    }
    
    .pagination a, .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 0.75rem;
        border-radius: var(--radius-md);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition-smooth);
    }
    
    .pagination a {
        color: var(--text-secondary);
        background: var(--bg-card);
        border: 1px solid rgba(46, 139, 87, 0.1);
    }
    
    .pagination a:hover {
        background: rgba(46, 139, 87, 0.1);
        color: var(--primary-green);
        transform: translateY(-2px);
        border-color: var(--primary-green);
    }
    
    .pagination .active span {
        background: var(--green-gradient);
        color: white;
        box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
    }
    
    .pagination .disabled span {
        color: var(--text-light);
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 1.5rem;
            align-items: flex-start;
        }
        
        .triaje-header {
            flex-direction: column;
            gap: 1rem;
        }
        
        .triaje-meta {
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .triaje-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .triaje-item {
            padding: 1.25rem;
        }
        
        .empty-state {
            padding: 3rem 1.5rem;
        }
        
        .empty-icon {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')

<div class="triajes-container">
    
    <div class="page-header">
        <div class="page-title-container">
            <h1>
                <i class="fas fa-clipboard-check"></i> Mis Triajes Psicológicos
            </h1>
            <p class="page-subtitle">
                Historial completo de tus evaluaciones psicológicas
            </p>
        </div>
        
        <a href="{{ route('triaje.create') }}" class="new-triage-btn">
            <i class="fas fa-plus-circle"></i> Nuevo Triaje
        </a>
    </div>
    
    @if($triajes && $triajes->count() > 0)
        <div class="triajes-list-container">
            @foreach($triajes as $triaje)
                <div class="triaje-item">
                    <div class="triaje-header">
                        <div class="triaje-info font-sans font-semibold">
                            <h3>{{ $triaje->nombre_paciente ?? 'Triaje psicológico' }}</h3>
                            <div class="triaje-meta">
                                <span class="meta-item">
                                    <i class="fas fa-calendar"></i> {{ $triaje->created_at->format('d/m/Y') }}
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-clock"></i> {{ $triaje->created_at->format('H:i') }}
                                </span>
                                @if($triaje->edad)
                                    <span class="meta-item">
                                        <i class="fas fa-user"></i> {{ $triaje->edad }} años
                                    </span>
                                @endif
                                <span class="meta-item">
                                    <i class="fas fa-file-medical"></i> ID: {{ $triaje->id }}
                                </span>
                            </div>
                        </div>
                        
                        <div>
                            @if($triaje->nivel_atencion)
                                @php
                                    $badgeClass = 'badge-';
                                    if(strpos($triaje->nivel_atencion, 'inmediata') !== false) {
                                        $badgeClass .= 'inmediata';
                                    } elseif(strpos($triaje->nivel_atencion, 'prioritaria') !== false) {
                                        $badgeClass .= 'prioritaria';
                                    } else {
                                        $badgeClass .= 'rutinaria';
                                    }
                                @endphp
                                <span class="triage-level-badge {{ $badgeClass }}">
                                    <i class="fas fa-flag"></i> {{ $triaje->nivel_atencion }}
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    @if($triaje->sintomas_principales)
                        <div class="symptoms-section">
                            <div class="symptoms-title">
                                <i class="fas fa-stethoscope"></i> Síntomas principales:
                            </div>
                            <div class="symptoms-content">
                                {{ Str::limit($triaje->sintomas_principales, 200) }}
                                @if(strlen($triaje->sintomas_principales) > 200)
                                    <span style="color: var(--primary-green); font-weight: 500;"> ...</span>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                    <div class="triaje-actions">
                        <div>
                            @if($triaje->recomendaciones)
                                <span style="display: inline-flex; align-items: center; gap: 0.5rem; color: var(--primary-green); font-weight: 500; font-size: 0.9rem;">
                                    <i class="fas fa-check-circle"></i> Recomendaciones disponibles
                                </span>
                            @endif
                        </div>
                        
                        <div style="display: flex; gap: 0.75rem;">
                            <a href="{{ route('triaje.show', $triaje->id) }}" class="action-btn btn-primary">
                                <i class="fas fa-eye"></i> Ver Detalles Completos
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="pagination-container">
            {{ $triajes->links() }}
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            
            <h3>No has realizado ningún triaje</h3>
            <p>Comienza evaluando tu salud mental con nuestro sistema de triaje psicológico para recibir recomendaciones personalizadas</p>
            
            <a href="{{ route('triaje.create') }}" class="new-triage-btn" style="margin-top: 1rem;">
                <i class="fas fa-plus-circle"></i> Crear Primer Triaje
            </a>
        </div>
    @endif
</div>

@endsection