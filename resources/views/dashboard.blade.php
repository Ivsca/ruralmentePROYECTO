@extends('layouts.admin')

@section('title', 'Dashboard - Panel Administrativo')

@push('styles')
<style>
    .dashboard-welcome {
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(27, 94, 32, 0.05) 100%);
        border-radius: var(--radius-xl);
        padding: 3rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
    }

    .dashboard-welcome::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(46, 139, 87, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .stats-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: 2rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .stats-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--card-color, var(--primary));
        transition: width 0.3s ease;
    }

    .stats-card:hover::after {
        width: 6px;
    }

    .stats-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-2px);
    }

    .icon-wrapper {
        width: 56px;
        height: 56px;
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        background: var(--icon-bg, var(--primary-light));
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--gray-900);
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--gray-500);
        margin-bottom: 1rem;
    }

    .stat-trend {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        border-radius: var(--radius-sm);
        font-size: 0.75rem;
        font-weight: 500;
        background: var(--trend-bg, var(--success-light));
        color: var(--trend-color, var(--success));
    }

    .chart-container {
        background: white;
        border-radius: var(--radius-xl);
        padding: 2.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--gray-200);
        margin-bottom: 2rem;
    }

    .quick-action-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .quick-action-card:hover {
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .action-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        background: var(--action-bg, var(--gray-100));
        color: var(--action-color, var(--gray-600));
    }

    .recent-activity {
        background: white;
        border-radius: var(--radius-xl);
        padding: 2rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--gray-200);
    }

    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid var(--gray-100);
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .activity-time {
        font-size: 0.75rem;
        color: var(--gray-400);
    }
</style>
@endpush

@section('content')

{{-- Bienvenida --}}
<div class="dashboard-welcome">
    <div class="max-w-3xl">
        <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-3">
            Bienvenido de nuevo, <span class="gradient-text">Administrador</span>
        </h1>
        <p class="text-lg text-gray-600 mb-6">
            Aquí tienes un resumen completo del sistema de salud mental. 
            Monitorea las evaluaciones, gestiona recursos y supervisa el bienestar de la comunidad.
        </p>
        <div class="flex items-center gap-3 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <i class="fas fa-calendar-check text-primary"></i>
                <span>{{ now()->format('l, d F Y') }}</span>
            </div>
            <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
            <div class="flex items-center gap-2">
                <i class="fas fa-clock text-primary"></i>
                <span>{{ now()->format('H:i') }} hrs</span>
            </div>
        </div>
    </div>
</div>

{{-- Estadísticas principales --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Total Triajes --}}
    <div class="stats-card" style="--card-color: var(--primary); --icon-bg: #E8F5E9;">
        <div class="icon-wrapper" style="background: #E8F5E9; color: var(--primary);">
            <i class="fas fa-clipboard-check text-xl"></i>
        </div>
        <div class="stat-number font-serif">{{ \App\Models\Triaje::count() }}</div>
        <p class="stat-label">Total de Triajes</p>
        <div class="flex items-center justify-between">
            <div class="stat-trend" style="--trend-bg: #D1FAE5; --trend-color: var(--success);">
                <i class="fas fa-arrow-up"></i>
                <span>12% este mes</span>
            </div>
            <a href="{{ route('admin.triaje') }}" class="text-primary hover:text-primary-dark text-sm font-medium flex items-center gap-1">
                Ver todos
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    {{-- Alto Riesgo --}}
    <div class="stats-card" style="--card-color: var(--danger); --icon-bg: #FEE2E2;">
        <div class="icon-wrapper" style="background: #FEE2E2; color: var(--danger);">
            <i class="fas fa-exclamation-triangle text-xl"></i>
        </div>
        @php
            $altoRiesgo = \App\Models\Triaje::whereIn('nivel_atencion', ['Atención inmediata', 'Atención en 24-48 horas'])->count();
        @endphp
        <div class="stat-number font-serif">{{ $altoRiesgo }}</div>
        <p class="stat-label">Casos de Alto Riesgo</p>
        <div class="flex items-center justify-between">
            <div class="stat-trend" style="--trend-bg: #FEE2E2; --trend-color: var(--danger);">
                <i class="fas fa-bell"></i>
                <span>Requieren atención</span>
            </div>
            <span class="text-xs text-gray-500 font-medium">Prioridad alta</span>
        </div>
    </div>

    {{-- Profesionales --}}
    <div class="stats-card" style="--card-color: var(--secondary); --icon-bg: #DBEAFE;">
        <div class="icon-wrapper" style="background: #DBEAFE; color: var(--secondary);">
            <i class="fas fa-user-md text-xl"></i>
        </div>
        <div class="stat-number font-serif">{{ \App\Models\User::count() }}</div>
        <p class="stat-label">Profesionales Activos</p>
        <div class="flex items-center justify-between">
            <div class="stat-trend" style="--trend-bg: #DBEAFE; --trend-color: var(--secondary);">
                <i class="fas fa-users"></i>
                <span>4 en línea</span>
            </div>
            <a href="#" class="text-secondary hover:text-secondary-dark text-sm font-medium flex items-center gap-1">
                Gestionar
                <i class="fas fa-cog text-xs"></i>
            </a>
        </div>
    </div>

    {{-- Productos --}}
    <div class="stats-card" style="--card-color: var(--success); --icon-bg: #D1FAE5;">
        <div class="icon-wrapper" style="background: #D1FAE5; color: var(--success);">
            <i class="fas fa-box-open text-xl"></i>
        </div>
        <div class="stat-number font-serif">{{ \App\Models\Product::count() }}</div>
        <p class="stat-label">Recursos Disponibles</p>
        <div class="flex items-center justify-between">
            <div class="stat-trend" style="--trend-bg: #D1FAE5; --trend-color: var(--success);">
                <i class="fas fa-check-circle"></i>
                <span>Disponibles</span>
            </div>
            <a href="{{ route('Tabla-productos') }}" class="text-success hover:text-success-dark text-sm font-medium flex items-center gap-1">
                Inventario
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>

{{-- Gráfico y Acciones Rápidas --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    {{-- Gráfico --}}
    <div class="chart-container lg:col-span-2">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Distribución de Triajes</h2>
                <p class="text-gray-500">Nivel de atención requerido</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">Período:</span>
                <select class="text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white">
                    <option>Últimos 7 días</option>
                    <option>Este mes</option>
                    <option>Últimos 3 meses</option>
                    <option>Este año</option>
                </select>
            </div>
        </div>
        <div class="h-80">
            <canvas id="triajeChart"></canvas>
        </div>
    </div>

    {{-- Acciones Rápidas --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Acciones Rápidas</h2>
        <div class="space-y-4">
            <a href="{{ route('triaje.create') }}" class="quick-action-card group">
                <div class="action-icon group-hover:scale-110" style="--action-bg: #E8F5E9; --action-color: var(--primary);">
                    <i class="fas fa-plus text-lg"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Nuevo Triaje</h3>
                <p class="text-sm text-gray-500">Registrar nueva evaluación psicológica</p>
            </a>

            <a href="{{ route('admin.triaje') }}" class="quick-action-card group">
                <div class="action-icon group-hover:scale-110" style="--action-bg: #DBEAFE; --action-color: var(--secondary);">
                    <i class="fas fa-list text-lg"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Ver Todos los Triajes</h3>
                <p class="text-sm text-gray-500">Revisar evaluaciones registradas</p>
            </a>

            <a href="{{ route('Tabla-productos') }}" class="quick-action-card group">
                <div class="action-icon group-hover:scale-110" style="--action-bg: #D1FAE5; --action-color: var(--success);">
                    <i class="fas fa-box text-lg"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Gestionar Recursos</h3>
                <p class="text-sm text-gray-500">Administrar inventario de productos</p>
            </a>

            <a href="#" class="quick-action-card group">
                <div class="action-icon group-hover:scale-110" style="--action-bg: #F3E8FF; --action-color: var(--accent);">
                    <i class="fas fa-chart-line text-lg"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Generar Reportes</h3>
                <p class="text-sm text-gray-500">Crear informes estadísticos</p>
            </a>
        </div>
    </div>
</div>

{{-- Actividad Reciente y Distribución --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    {{-- Actividad Reciente --}}
    <div class="recent-activity lg:col-span-2">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Actividad Reciente</h2>
        <div class="space-y-2">
            @php
                $recentTriajes = \App\Models\Triaje::latest()->take(5)->get();
            @endphp
            
            @forelse($recentTriajes as $triaje)
            <div class="activity-item">
                <div class="activity-icon" style="background: #E8F5E9; color: var(--primary);">
                    <i class="fas fa-user-injured"></i>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-medium text-gray-900">{{ $triaje->nombre_paciente }}</p>
                            <p class="text-sm text-gray-500">Nivel: {{ $triaje->nivel_atencion }}</p>
                        </div>
                        <span class="activity-time">{{ $triaje->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Evaluado por: {{ $triaje->user->name ?? 'Sistema' }}</p>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                </div>
                <p class="text-gray-500">No hay actividad reciente</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Distribución por Nivel --}}
    <div class="chart-container">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Distribución por Nivel</h2>
        <div class="h-64">
            <canvas id="nivelChart"></canvas>
        </div>
        <div class="mt-6 space-y-3">
            @php
                $niveles = [
                    'Atención inmediata' => ['color' => '#EF4444', 'count' => \App\Models\Triaje::where('nivel_atencion', 'Atención inmediata')->count()],
                    '24-48 horas' => ['color' => '#F59E0B', 'count' => \App\Models\Triaje::where('nivel_atencion', 'Atención en 24-48 horas')->count()],
                    'Prioritaria' => ['color' => '#8B5CF6', 'count' => \App\Models\Triaje::where('nivel_atencion', 'Atención prioritaria')->count()],
                    'Rutinaria' => ['color' => '#10B981', 'count' => \App\Models\Triaje::where('nivel_atencion', 'Atención rutinaria')->count()]
                ];
            @endphp
            
            @foreach($niveles as $nivel => $data)
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full" style="background-color: {{ $data['color'] }}"></div>
                    <span class="text-sm font-medium text-gray-700">{{ $nivel }}</span>
                </div>
                <span class="font-semibold" style="color: {{ $data['color'] }}">{{ $data['count'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gráfico principal de barras
    const triajeCtx = document.getElementById('triajeChart').getContext('2d');
    
    @php
        $inmediata = \App\Models\Triaje::where('nivel_atencion', 'Atención inmediata')->count();
        $horas24_48 = \App\Models\Triaje::where('nivel_atencion', 'Atención en 24-48 horas')->count();
        $prioritaria = \App\Models\Triaje::where('nivel_atencion', 'Atención prioritaria')->count();
        $rutinaria = \App\Models\Triaje::where('nivel_atencion', 'Atención rutinaria')->count();
    @endphp
    
    new Chart(triajeCtx, {
        type: 'bar',
        data: {
            labels: ['Inmediata', '24-48h', 'Prioritaria', 'Rutinaria'],
            datasets: [{
                label: 'Cantidad',
                data: [{{ $inmediata }}, {{ $horas24_48 }}, {{ $prioritaria }}, {{ $rutinaria }}],
                backgroundColor: [
                    'rgba(239, 68, 68, 0.9)',
                    'rgba(245, 158, 11, 0.9)',
                    'rgba(139, 92, 246, 0.9)',
                    'rgba(16, 185, 129, 0.9)'
                ],
                borderColor: [
                    'rgb(239, 68, 68)',
                    'rgb(245, 158, 11)',
                    'rgb(139, 92, 246)',
                    'rgb(16, 185, 129)'
                ],
                borderWidth: 1,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleFont: { size: 13 },
                    bodyFont: { size: 13 },
                    padding: 12,
                    cornerRadius: 6
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        font: { size: 11 }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: { size: 12, weight: '500' }
                    }
                }
            }
        }
    });

    // Gráfico de distribución (doughnut)
    const nivelCtx = document.getElementById('nivelChart').getContext('2d');
    
    new Chart(nivelCtx, {
        type: 'doughnut',
        data: {
            labels: ['Inmediata', '24-48h', 'Prioritaria', 'Rutinaria'],
            datasets: [{
                data: [{{ $inmediata }}, {{ $horas24_48 }}, {{ $prioritaria }}, {{ $rutinaria }}],
                backgroundColor: [
                    'rgba(239, 68, 68, 0.9)',
                    'rgba(245, 158, 11, 0.9)',
                    'rgba(139, 92, 246, 0.9)',
                    'rgba(16, 185, 129, 0.9)'
                ],
                borderColor: 'white',
                borderWidth: 2,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleFont: { size: 13 },
                    bodyFont: { size: 13 },
                    padding: 12,
                    cornerRadius: 6
                }
            }
        }
    });

    // Animación para las tarjetas
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Aplicar animación a las tarjetas
    document.querySelectorAll('.stats-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endpush