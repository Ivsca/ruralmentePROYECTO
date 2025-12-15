@extends('layouts.admin')

@section('page-title', 'Triajes psicológicos')
@section('page-subtitle', 'Listado completo de evaluaciones')

@push('styles')
<style>
    .triajes-admin-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    
    .page-header-admin {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid rgba(46, 139, 87, 0.1);
    }

    .page-title-admin h1 {
        color: var(--text-primary);
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .page-title-admin h1 i {
        color: var(--primary-green);
        font-size: 1.6rem;
    }

    .page-subtitle-admin {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-top: 0.25rem;
    }

    .refresh-btn {
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

    .refresh-btn:hover {
        transform: translateY(-2px) rotate(5deg);
        box-shadow: 0 6px 16px rgba(46, 139, 87, 0.3);
        color: white;
    }

    .triajes-list-admin {
        background: var(--bg-card);
        border-radius: var(--card-radius);
        overflow: hidden;
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
    }

    .triaje-item-admin {
        padding: 1.75rem;
        border-bottom: 1px solid rgba(46, 139, 87, 0.08);
        transition: var(--transition-smooth);
        position: relative;
        background: var(--bg-card);
    }

    .triaje-item-admin:hover {
        background: linear-gradient(90deg, rgba(46, 139, 87, 0.02) 0%, rgba(255, 255, 255, 1) 100%);
        transform: translateX(5px);
    }

    .triaje-item-admin:last-child {
        border-bottom: none;
    }

   
    .triaje-header-admin {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.25rem;
    }

    .triaje-info-admin h3 {
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .triaje-info-admin h3 i {
        color: var(--primary-green);
        font-size: 1rem;
    }

    .triaje-meta-admin {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.5rem;
        font-size: 0.9rem;
        color: var(--text-light);
        margin-top: 0.5rem;
    }

    .meta-item-admin {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0.5rem;
        background: rgba(46, 139, 87, 0.05);
        border-radius: var(--radius-sm);
    }

    .meta-item-admin i {
        color: var(--primary-green);
        font-size: 0.8rem;
    }

   
    .triage-level-badge-admin {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        border-radius: var(--radius-full);
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        min-width: 160px;
        justify-content: center;
    }

    .badge-inmediata-admin { 
        background: linear-gradient(135deg, #FCA5A5 0%, #EF4444 100%); 
        color: white; 
    }
    
    .badge-prioritaria-admin { 
        background: linear-gradient(135deg, #FCD34D 0%, #F59E0B 100%); 
        color: white; 
    }
    
    .badge-rutinaria-admin { 
        background: linear-gradient(135deg, #86EFAC 0%, #10B981 100%); 
        color: white; 
    }

    
    .symptoms-section-admin {
        margin-bottom: 1.5rem;
        padding: 1.25rem;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.03) 0%, rgba(255, 255, 255, 1) 100%);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
        border-left: 4px solid var(--primary-green);
    }

    .symptoms-title-admin {
        font-weight: 600;
        color: var(--primary-green);
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .symptoms-content-admin {
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    
    .triaje-actions-admin {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .action-buttons-admin {
        display: flex;
        gap: 0.75rem;
    }

    .action-btn-admin {
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

    .btn-primary-admin {
        background: var(--green-gradient);
        color: white;
        box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
    }

    .btn-primary-admin:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(46, 139, 87, 0.3);
        color: white;
    }

    .btn-secondary-admin {
        background: var(--bg-card);
        color: var(--primary-green);
        border: 1px solid rgba(46, 139, 87, 0.2);
    }

    .btn-secondary-admin:hover {
        background: rgba(46, 139, 87, 0.1);
        border-color: var(--primary-green);
        transform: translateY(-2px);
    }

    
    .empty-state-admin {
        text-align: center;
        padding: 5rem 2rem;
        background: var(--bg-card);
        border-radius: var(--card-radius);
        border: 2px dashed rgba(46, 139, 87, 0.2);
        transition: var(--transition-smooth);
    }

    .empty-state-admin:hover {
        border-color: rgba(46, 139, 87, 0.3);
        transform: translateY(-2px);
    }

    .empty-icon-admin {
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

    .empty-state-admin h3 {
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        font-size: 1.4rem;
        font-weight: 600;
    }

    .empty-state-admin p {
        color: var(--text-light);
        margin-bottom: 2rem;
        font-size: 0.95rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    
    .pagination-container-admin {
        margin-top: 2.5rem;
        padding: 1.5rem;
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
    }

    
    .pagination-container-admin .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .pagination-container-admin .pagination li {
        margin: 0;
    }

    .pagination-container-admin .pagination .page-link,
    .pagination-container-admin .pagination .page-item.disabled .page-link,
    .pagination-container-admin .pagination .page-item.active .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        height: 44px;
        padding: 0 0.75rem;
        border-radius: var(--radius-md);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition-smooth);
        border: 1px solid rgba(46, 139, 87, 0.1);
        background: var(--bg-card);
        color: var(--text-secondary);
    }

    .pagination-container-admin .pagination .page-link:hover {
        background: rgba(46, 139, 87, 0.1);
        color: var(--primary-green);
        transform: translateY(-2px);
        border-color: var(--primary-green);
        box-shadow: var(--shadow-sm);
    }

    .pagination-container-admin .pagination .page-item.active .page-link {
        background: var(--green-gradient);
        color: white;
        border-color: var(--primary-green);
        box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
        transform: translateY(-2px);
    }

    .pagination-container-admin .pagination .page-item.disabled .page-link {
        color: var(--text-light);
        opacity: 0.5;
        cursor: not-allowed;
        background: var(--gray-100);
    }

    .pagination-container-admin .pagination .page-link:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.1);
    }

    
    .quick-stats-admin {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: var(--bg-card);
        border-radius: var(--card-radius);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
    }

    .quick-stat-item {
        text-align: center;
        padding: 1rem;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.05) 0%, rgba(255, 255, 255, 1) 100%);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
        transition: var(--transition-smooth);
    }

    .quick-stat-item:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }

    .quick-stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-family: 'Poppins', sans-serif;
    }

    .quick-stat-label {
        font-size: 0.85rem;
        color: var(--text-light);
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header-admin {
            flex-direction: column;
            gap: 1.5rem;
            align-items: flex-start;
        }
        
        .triaje-header-admin {
            flex-direction: column;
            gap: 1rem;
        }
        
        .triaje-meta-admin {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .triaje-actions-admin {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .action-buttons-admin {
            width: 100%;
            justify-content: space-between;
        }
        
        .triaje-item-admin {
            padding: 1.25rem;
        }
        
        .empty-state-admin {
            padding: 3rem 1.5rem;
        }
        
        .empty-icon-admin {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
        
        .quick-stats-admin {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .pagination-container-admin .pagination {
            gap: 0.25rem;
        }
        
        .pagination-container-admin .pagination .page-link {
            min-width: 40px;
            height: 40px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .quick-stats-admin {
            grid-template-columns: 1fr;
        }
        
        .action-buttons-admin {
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .action-btn-admin {
            width: 100%;
            justify-content: center;
        }
        
        .pagination-container-admin .pagination {
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 0.5rem;
            justify-content: flex-start;
        }
        
        .pagination-container-admin .pagination .page-link {
            min-width: 36px;
            height: 36px;
            font-size: 0.85rem;
        }
    }
</style>
@endpush

@section('content')

<div class="triajes-admin-container">
    
    
    <div class="page-header-admin">
        <div class="page-title-admin">
            <h1>
                <i class="fas fa-clipboard-check"></i> Triajes Psicológicos — Administración
            </h1>
            <p class="page-subtitle-admin">
                Listado completo de evaluaciones del sistema
            </p>
        </div>

        <a href="{{ route('admin.triajes.index') }}" class="refresh-btn">
            <i class="fas fa-sync-alt"></i> Actualizar Lista
        </a>
    </div>

    
    <div class="quick-stats-admin">
        <div class="quick-stat-item">
            <div class="quick-stat-value">{{ $triajes->total() ?? 0 }}</div>
            <div class="quick-stat-label">Total Triajes</div>
        </div>
        <div class="quick-stat-item">
            <div class="quick-stat-value">{{ $triajes->where('nivel_atencion', 'like', '%inmediata%')->count() }}</div>
            <div class="quick-stat-label">Casos Urgentes</div>
        </div>
        <div class="quick-stat-item">
            <div class="quick-stat-value">{{ $triajes->where('nivel_atencion', 'like', '%prioritaria%')->count() }}</div>
            <div class="quick-stat-label">Casos Prioritarios</div>
        </div>
        <div class="quick-stat-item">
            <div class="quick-stat-value">{{ $triajes->unique('user_id')->count() }}</div>
            <div class="quick-stat-label">Usuarios Activos</div>
        </div>
    </div>

    @if($triajes && $triajes->count() > 0)
        <div class="triajes-list-admin">
            @foreach($triajes as $triaje)
                <div class="triaje-item-admin">
                    
                    <div class="triaje-header-admin">
                        <div class="triaje-info-admin">
                            <h3>
                                <i class="fas fa-user-md"></i>
                                {{ $triaje->nombre_paciente ?? 'Triaje Psicológico' }}
                            </h3>

                            <div class="triaje-meta-admin">
                                <span class="meta-item-admin">
                                    <i class="fas fa-calendar"></i> {{ $triaje->created_at->format('d/m/Y') }}
                                </span>
                                <span class="meta-item-admin">
                                    <i class="fas fa-clock"></i> {{ $triaje->created_at->format('H:i') }}
                                </span>

                                @if($triaje->edad)
                                    <span class="meta-item-admin">
                                        <i class="fas fa-user"></i> {{ $triaje->edad }} años
                                    </span>
                                @endif

                                <span class="meta-item-admin">
                                    <i class="fas fa-user-shield"></i> {{ $triaje->user->name ?? 'Usuario' }}
                                </span>
                            </div>
                        </div>

                       
                        <div>
                            @if($triaje->nivel_atencion)
                                @php
                                    $badgeClass = 'badge-';
                                    if(strpos($triaje->nivel_atencion, 'inmediata') !== false) {
                                        $badgeClass .= 'inmediata-admin';
                                    } elseif(strpos($triaje->nivel_atencion, 'prioritaria') !== false) {
                                        $badgeClass .= 'prioritaria-admin';
                                    } else {
                                        $badgeClass .= 'rutinaria-admin';
                                    }
                                @endphp

                                <span class="triage-level-badge-admin {{ $badgeClass }}">
                                    <i class="fas fa-flag"></i> {{ $triaje->nivel_atencion }}
                                </span>
                            @endif
                        </div>
                    </div>

                   
                    @if($triaje->sintomas_principales)
                        <div class="symptoms-section-admin">
                            <div class="symptoms-title-admin">
                                <i class="fas fa-stethoscope"></i> Síntomas principales:
                            </div>
                            <div class="symptoms-content-admin">
                                {{ Str::limit($triaje->sintomas_principales, 200) }}
                                @if(strlen($triaje->sintomas_principales) > 200)
                                    <span style="color: var(--primary-green); font-weight: 500;"> ...</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    
                    <div class="triaje-actions-admin">
                        <div>
                            <span style="display: inline-flex; align-items: center; gap: 0.5rem; color: var(--text-light); font-size: 0.85rem;">
                                <i class="fas fa-id-card"></i> ID: {{ $triaje->id }}
                            </span>
                        </div>
                        
                        <div class="action-buttons-admin">
                            <a href="{{ route('admin.triajes.show', $triaje->id) }}" class="action-btn-admin btn-primary-admin">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                            @if($triaje->user)
                                <a href="{{ route('admin.users.show', $triaje->user->id) }}" 
                                class="action-btn-admin btn-secondary-admin">
                                    <i class="fas fa-user"></i> Ver usuario
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        
        <div class="pagination-container-admin">
            {{ $triajes->links() }}
        </div>

    @else
       
        <div class="empty-state-admin">
            <div class="empty-icon-admin">
                <i class="fas fa-clipboard-list"></i>
            </div>

            <h3>No hay triajes registrados</h3>
            <p>El sistema aún no tiene registros de evaluaciones psicológicas</p>
            
            <div style="margin-top: 1.5rem;">
                <a href="{{ route('admin.dashboard') }}" class="action-btn-admin btn-primary-admin">
                    <i class="fas fa-arrow-left"></i> Volver al Dashboard
                </a>
            </div>
        </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
   
    const badges = document.querySelectorAll('.triage-level-badge-admin');
    
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    
    const statItems = document.querySelectorAll('.quick-stat-item');
    
    statItems.forEach(item => {
        const valueElement = item.querySelector('.quick-stat-value');
        const originalValue = valueElement.textContent;
        let animated = false;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !animated) {
                    animated = true;
                    let current = 0;
                    const target = parseInt(originalValue);
                    const increment = target / 30;
                    
                    const counter = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(counter);
                        }
                        valueElement.textContent = Math.floor(current);
                    }, 30);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(item);
    });
});
</script>
@endpush