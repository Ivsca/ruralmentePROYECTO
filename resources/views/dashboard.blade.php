@extends('layouts.admin')

@section('title', 'Dashboard - Panel Administrativo')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Resumen general del sistema')

@push('styles')
<style>
    /* Estadísticas principales */
    .main-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-box {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .stat-box.primary {
        border-left: 4px solid #2E8B57;
    }

    .stat-box.warning {
        border-left: 4px solid #F59E0B;
    }

    .stat-box.danger {
        border-left: 4px solid #EF4444;
    }

    .stat-box.success {
        border-left: 4px solid #10B981;
    }

    .stat-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .stat-icon.primary { background: #E8F5E9; color: #2E8B57; }
    .stat-icon.warning { background: #FEF3C7; color: #F59E0B; }
    .stat-icon.danger { background: #FEE2E2; color: #EF4444; }
    .stat-icon.success { background: #D1FAE5; color: #10B981; }

    .stat-title {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: #111827;
    }

    .stat-change {
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .stat-change.positive { color: #10B981; }
    .stat-change.negative { color: #EF4444; }

    /* Grid de contenido */
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Tablas y listas */
    .recent-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        height: 100%;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
    }

    .card-link {
        color: #2E8B57;
        font-size: 0.875rem;
        text-decoration: none;
        font-weight: 500;
    }

    .card-link:hover {
        text-decoration: underline;
    }

    /* Lista de elementos */
    .item-list {
        list-style: none;
    }

    .list-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .list-item:last-child {
        border-bottom: none;
    }

    .item-icon {
        width: 36px;
        height: 36px;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    .item-info {
        flex: 1;
    }

    .item-title {
        display: block;
        font-weight: 500;
        color: #111827;
        margin-bottom: 0.125rem;
    }

    .item-subtitle {
        font-size: 0.75rem;
        color: #6b7280;
    }

    .item-badge {
        padding: 0.25rem 0.5rem;
        border-radius: 0.375rem;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-danger { background: #FEE2E2; color: #EF4444; }
    .badge-warning { background: #FEF3C7; color: #F59E0B; }
    .badge-success { background: #D1FAE5; color: #10B981; }
    .badge-info { background: #EFF6FF; color: #3B82F6; }

    /* Gráficos */
    .chart-container {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
    }

    .chart-wrapper {
        height: 300px;
        position: relative;
    }

    /* Quick Actions */
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        text-decoration: none;
        color: #374151;
        transition: all 0.2s ease;
    }

    .action-btn:hover {
        border-color: #2E8B57;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .action-icon {
        width: 40px;
        height: 40px;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #E8F5E9;
        color: #2E8B57;
    }

    .action-text {
        font-weight: 500;
    }

    /* Estado vacío */
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #9ca3af;
    }

    .empty-state i {
        font-size: 2rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
</style>
@endpush

@section('content')

<!-- Acciones rápidas -->
<div class="quick-actions">
    <a href="{{ route('admin.triajes.index') }}" class="action-btn">
        <div class="action-icon">
            <i class="fas fa-clipboard-check"></i>
        </div>
        <span class="action-text">Ver Triajes</span>
    </a>
    
    <a href="{{ route('admin.products.index') }}" class="action-btn">
        <div class="action-icon">
            <i class="fas fa-box-open"></i>
        </div>
        <span class="action-text">Gestionar Productos</span>
    </a>
    
    <a href="{{ route('admin.users.index') }}" class="action-btn">
        <div class="action-icon">
            <i class="fas fa-users"></i>
        </div>
        <span class="action-text">Ver Usuarios</span>
    </a>
    
    <a href="{{ route('admin.export.triajes') }}" class="action-btn">
        <div class="action-icon">
            <i class="fas fa-file-export"></i>
        </div>
        <span class="action-text">Exportar Datos</span>
    </a>
</div>

<!-- Estadísticas principales -->
<div class="main-stats">
    <!-- Triajes -->
    <div class="stat-box primary">
        <div class="stat-header">
            <div class="stat-icon primary">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <div>
                <div class="stat-title">Total de Triajes</div>
                <div class="stat-value">{{ $stats['total_triajes'] }}</div>
            </div>
        </div>
        <div class="stat-change positive">
            <i class="fas fa-arrow-up"></i>
            {{ $stats['triajes_hoy'] }} hoy
        </div>
    </div>

    <!-- Productos -->
    <div class="stat-box success">
        <div class="stat-header">
            <div class="stat-icon success">
                <i class="fas fa-box-open"></i>
            </div>
            <div>
                <div class="stat-title">Productos Registrados</div>
                <div class="stat-value">{{ $stats['total_productos'] }}</div>
            </div>
        </div>
        <div class="stat-change positive">
            <i class="fas fa-check-circle"></i>
            Disponibles
        </div>
    </div>

    <!-- Usuarios -->
    <div class="stat-box warning">
        <div class="stat-header">
            <div class="stat-icon warning">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <div class="stat-title">Usuarios Registrados</div>
                <div class="stat-value">{{ $stats['total_usuarios'] }}</div>
            </div>
        </div>
    </div>

    <!-- Casos Urgentes -->
    <div class="stat-box danger">
        <div class="stat-header">
            <div class="stat-icon danger">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div>
                <div class="stat-title">Casos Urgentes</div>
                <div class="stat-value">{{ $stats['triajes_urgentes'] }}</div>
            </div>
        </div>
        <div class="stat-change negative">
            <i class="fas fa-bell"></i>
            Requieren atención
        </div>
    </div>
</div>

<!-- Gráficos y contenido -->
<div class="content-grid">
    <!-- Gráfico de distribución -->
    <div class="chart-container">
        <div class="card-header">
            <h3 class="card-title">Distribución por Nivel de Atención</h3>
        </div>
        <div class="chart-wrapper">
            <canvas id="distributionChart"></canvas>
        </div>
    </div>

    <!-- Resumen de actividad -->
    <div class="recent-card">
        <div class="card-header">
            <h3 class="card-title">Resumen del Sistema</h3>
        </div>
        <ul class="item-list">
            <li class="list-item">
                <div class="item-icon" style="background: #E8F5E9; color: #2E8B57;">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">Triajes Totales</span>
                    <span class="item-subtitle">{{ $stats['total_triajes'] }} evaluaciones</span>
                </div>
                <span class="item-badge badge-info">{{ $stats['triajes_hoy'] }} hoy</span>
            </li>
            <li class="list-item">
                <div class="item-icon" style="background: #D1FAE5; color: #10B981;">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">Productos en Inventario</span>
                    <span class="item-subtitle">{{ $stats['total_productos'] }} registrados</span>
                </div>
                <span class="item-badge badge-success">Stock</span>
            </li>
            <li class="list-item">
                <div class="item-icon" style="background: #FEF3C7; color: #F59E0B;">
                    <i class="fas fa-user-friends"></i>
                </div>
                <span class="item-badge badge-warning">{{ $stats['total_usuarios'] }} total</span>
            </li>
            <li class="list-item">
                <div class="item-icon" style="background: #FEE2E2; color: #EF4444;">
                    <i class="fas fa-ambulance"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">Casos Prioritarios</span>
                    <span class="item-subtitle">{{ $stats['triajes_urgentes'] }} urgentes</span>
                </div>
                <span class="item-badge badge-danger">Atención</span>
            </li>
        </ul>
    </div>
</div>

<!-- Tablas recientes -->
<div class="content-grid">
    <!-- Triajes recientes -->
    <div class="recent-card">
        <div class="card-header">
            <h3 class="card-title">Triajes Recientes</h3>
            <a href="{{ route('admin.triajes.index') }}" class="card-link">Ver todos →</a>
        </div>
        <ul class="item-list">
            @forelse($recentTriajes as $triaje)
            <li class="list-item">
                <div class="item-icon" style="background: #E8F5E9; color: #2E8B57;">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">{{ $triaje->nombre_paciente }}</span>
                    <span class="item-subtitle">
                        {{ $triaje->nivel_atencion }} • {{ $triaje->created_at->diffForHumans() }}
                    </span>
                </div>
                @if(in_array($triaje->nivel_atencion, ['Atención inmediata', 'Atención en 24-48 horas']))
                <span class="item-badge badge-danger">Urgente</span>
                @elseif($triaje->nivel_atencion == 'Atención prioritaria')
                <span class="item-badge badge-warning">Prioritario</span>
                @else
                <span class="item-badge badge-success">Rutinario</span>
                @endif
            </li>
            @empty
            <li class="empty-state">
                <i class="fas fa-inbox"></i>
                <p>No hay triajes recientes</p>
            </li>
            @endforelse
        </ul>
    </div>

    <!-- Usuarios recientes -->
    <div class="recent-card">
        <div class="card-header">
            <h3 class="card-title">Usuarios Recientes</h3>
            <a href="{{ route('admin.users.index') }}" class="card-link">Ver todos →</a>
        </div>
        <ul class="item-list">
            @forelse($recentUsers as $user)
            <li class="list-item">
                <div class="item-icon" style="background: #DBEAFE; color: #3B82F6;">
                    <i class="fas fa-user"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">{{ $user->name }}</span>
                    <span class="item-subtitle">
                        {{ $user->email }} • {{ $user->created_at->diffForHumans() }}
                    </span>
                </div>
                <span class="item-badge badge-info">Activo</span>
            </li>
            @empty
            <li class="empty-state">
                <i class="fas fa-users"></i>
                <p>No hay usuarios recientes</p>
            </li>
            @endforelse
        </ul>
    </div>
</div>

<!-- Productos recientes -->
<div class="recent-card">
    <div class="card-header">
        <h3 class="card-title">Productos Recientes</h3>
        <a href="{{ route('admin.products.index') }}" class="card-link">Ver todos →</a>
    </div>
    <ul class="item-list">
        @forelse($recentProducts as $product)
        <li class="list-item">
            <div class="item-icon" style="background: #D1FAE5; color: #10B981;">
                <i class="fas fa-box"></i>
            </div>
            <div class="item-info">
                <span class="item-title">{{ $product->nombre }}</span>
                <span class="item-subtitle">
                    {{ $product->categoria }} • {{ $product->created_at->diffForHumans() }}
                </span>
            </div>
            <span class="item-badge badge-success">
                ${{ number_format($product->precio, 2) }}
            </span>
        </li>
        @empty
        <li class="empty-state">
            <i class="fas fa-box-open"></i>
            <p>No hay productos recientes</p>
        </li>
        @endforelse
    </ul>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gráfico de distribución
    const distributionCtx = document.getElementById('distributionChart').getContext('2d');
    
    new Chart(distributionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Inmediata', '24-48 horas', 'Prioritaria', 'Rutinaria'],
            datasets: [{
                data: [
                    {{ $distribution['inmediata'] }},
                    {{ $distribution['horas_24_48'] }},
                    {{ $distribution['prioritaria'] }},
                    {{ $distribution['rutinaria'] }}
                ],
                backgroundColor: [
                    'rgb(239, 68, 68)',
                    'rgb(245, 158, 11)',
                    'rgb(139, 92, 246)',
                    'rgb(16, 185, 129)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });
});
</script>
@endpush