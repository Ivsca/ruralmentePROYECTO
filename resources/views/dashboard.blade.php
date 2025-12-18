@extends('layouts.admin')

@section('title', 'Dashboard - Panel Administrativo')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Resumen general del sistema')

@push('styles')
<style>
    :root {
        --card-radius: 20px;
        --card-padding: 1.75rem;
        --transition-smooth: all 0.3s ease;
    }

    
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.25rem;
        margin-bottom: 2.5rem;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        background: var(--bg-card);
        border: 1px solid rgba(46, 139, 87, 0.1);
        border-radius: var(--radius-lg);
        text-decoration: none;
        color: var(--text-primary);
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .action-btn::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 4px;
        background: var(--green-gradient);
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }

    .action-btn:hover {
        transform: translateY(-5px);
        border-color: rgba(46, 139, 87, 0.2);
        box-shadow: var(--shadow-lg);
    }

    .action-icon {
        width: 50px;
        height: 50px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--green-gradient);
        color: white;
        font-size: 1.25rem;
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.2);
        transition: var(--transition-smooth);
    }

    .action-btn:hover .action-icon {
        transform: scale(1.1) rotate(10deg);
    }

    .action-text {
        font-weight: 600;
        font-size: 0.95rem;
        color: var(--text-primary);
    }

    
    .main-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .stat-box {
        background: var(--bg-card);
        border-radius: var(--card-radius);
        padding: var(--card-padding);
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(46, 139, 87, 0.1);
        position: relative;
        overflow: hidden;
    }

    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .stat-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: var(--green-gradient);
        border-radius: var(--radius-full) 0 0 var(--radius-full);
    }

    .stat-box.primary::before { background: var(--green-gradient); }
    .stat-box.success::before { background: linear-gradient(135deg, #10B981 0%, #059669 100%); }
    .stat-box.warning::before { background: var(--warm-gradient); }
    .stat-box.danger::before { background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%); }

    .stat-header {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        margin-bottom: 1rem;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .stat-icon.primary { 
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(60, 179, 113, 0.2) 100%); 
        color: var(--primary-green); 
    }
    
    .stat-icon.success { 
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.2) 100%); 
        color: #10B981; 
    }
    
    .stat-icon.warning { 
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.2) 100%); 
        color: #F59E0B; 
    }
    
    .stat-icon.danger { 
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.2) 100%); 
        color: #EF4444; 
    }

    .stat-content h3 {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--text-primary);
        font-family: 'Poppins', sans-serif;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-change {
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }

    .stat-change.positive { color: #10B981; }
    .stat-change.negative { color: #EF4444; }

    
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.75rem;
        margin-bottom: 2.5rem;
    }

    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    
    .dashboard-card {
        background: var(--bg-card);
        border-radius: var(--card-radius);
        padding: var(--card-padding);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
        height: 100%;
        transition: var(--transition-smooth);
    }

    .dashboard-card:hover {
        box-shadow: var(--shadow-md);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.75rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(46, 139, 87, 0.1);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-primary);
        font-family: 'Poppins', sans-serif;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-title i {
        color: var(--primary-green);
    }

    .card-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-green);
        font-size: 0.9rem;
        text-decoration: none;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: var(--radius-full);
        background: rgba(46, 139, 87, 0.1);
        transition: var(--transition-smooth);
    }

    .card-link:hover {
        background: var(--primary-green);
        color: white;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.2);
    }

    
    .item-list {
        list-style: none;
    }

    .list-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(46, 139, 87, 0.08);
        transition: var(--transition-smooth);
    }

    .list-item:hover {
        background: linear-gradient(90deg, rgba(46, 139, 87, 0.02) 0%, rgba(255, 255, 255, 0) 100%);
        transform: translateX(5px);
    }

    .list-item:last-child {
        border-bottom: none;
    }

    .item-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        background: var(--bg-card);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
        transition: var(--transition-smooth);
    }

    .list-item:hover .item-icon {
        transform: scale(1.05);
        border-color: rgba(46, 139, 87, 0.2);
    }

    .item-info {
        flex: 1;
    }

    .item-title {
        display: block;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }

    .item-subtitle {
        font-size: 0.8rem;
        color: var(--text-light);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .item-subtitle i {
        font-size: 0.7rem;
        color: var(--primary-green);
    }

    .item-badge {
        padding: 0.4rem 0.875rem;
        border-radius: var(--radius-full);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .badge-danger { 
        background: linear-gradient(135deg, #FCA5A5 0%, #EF4444 100%); 
        color: white; 
    }
    
    .badge-warning { 
        background: var(--warm-gradient); 
        color: white; 
    }
    
    .badge-success { 
        background: linear-gradient(135deg, #86EFAC 0%, #10B981 100%); 
        color: white; 
    }
    
    .badge-info { 
        background: var(--sky-gradient); 
        color: white; 
    }

    
    .chart-container {
        background: var(--bg-card);
        border-radius: var(--card-radius);
        padding: var(--card-padding);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
        transition: var(--transition-smooth);
    }

    .chart-container:hover {
        box-shadow: var(--shadow-md);
    }

    .chart-wrapper {
        height: 320px;
        position: relative;
    }

    
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: var(--text-light);
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.05) 0%, rgba(46, 139, 87, 0.1) 100%);
        color: var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.1);
    }

    .empty-state p {
        font-size: 0.95rem;
        margin-top: 0.5rem;
    }

   
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 1.75rem;
        margin-bottom: 2.5rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .main-stats {
            grid-template-columns: 1fr;
        }
        
        .quick-actions {
            grid-template-columns: 1fr;
        }
        
        .cards-grid {
            grid-template-columns: 1fr;
        }
        
        .stat-value {
            font-size: 2rem;
        }
        
        .chart-wrapper {
            height: 280px;
        }
    }
</style>
@endpush

@section('content')


<div class="quick-actions">
    <a href="{{ route('admin.triajes.index') }}" class="action-btn">
        <div class="action-icon">
            <i class="fas fa-clipboard-check"></i>
        </div>
        <span class="action-text">Ver Triajes</span>
    </a>
    
    <a href="{{ route('admin.Tabla-productos') }}" class="action-btn">
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
    
</div>


<div class="main-stats">
    
    <div class="stat-box primary">
        <div class="stat-header">
            <div class="stat-icon primary">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <div class="stat-content">
                <h3>Total de Triajes</h3>
                <div class="stat-value">{{ $stats['total_triajes'] }}</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    {{ $stats['triajes_hoy'] }} hoy
                </div>
            </div>
        </div>
    </div>

    
    <div class="stat-box success">
        <div class="stat-header">
            <div class="stat-icon success">
                <i class="fas fa-box-open"></i>
            </div>
            <div class="stat-content">
                <h3>Productos Registrados</h3>
                <div class="stat-value">{{ $stats['total_productos'] }}</div>
                <div class="stat-change positive">
                    <i class="fas fa-check-circle"></i>
                    Disponibles en stock
                </div>
            </div>
        </div>
    </div>

    
    <div class="stat-box warning">
        <div class="stat-header">
            <div class="stat-icon warning">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3>Usuarios Registrados</h3>
                <div class="stat-value">{{ $stats['total_usuarios'] }}</div>
            </div>
        </div>
    </div>

    
    <div class="stat-box danger">
        <div class="stat-header">
            <div class="stat-icon danger">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-content">
                <h3>Casos Urgentes</h3>
                <div class="stat-value">{{ $stats['triajes_urgentes'] }}</div>
                <div class="stat-change negative">
                    <i class="fas fa-bell"></i>
                    Requieren atención inmediata
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content-grid">
    <div class="chart-container">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie"></i>
                Distribución por Nivel de Atención
            </h3>
        </div>
        <div class="chart-wrapper">
            <canvas id="distributionChart"></canvas>
        </div>
    </div>

    
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tachometer-alt"></i>
                Resumen del Sistema
            </h3>
        </div>
        <ul class="item-list">
            <li class="list-item">
                <div class="item-icon" style="background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(60, 179, 113, 0.2) 100%); color: var(--primary-green);">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">Triajes Totales</span>
                    <span class="item-subtitle">
                        <i class="fas fa-history"></i>
                        {{ $stats['total_triajes'] }} evaluaciones
                    </span>
                </div>
                <span class="item-badge badge-info">{{ $stats['triajes_hoy'] }} hoy</span>
            </li>
            <li class="list-item">
                <div class="item-icon" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.2) 100%); color: #10B981;">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">Productos en Inventario</span>
                    <span class="item-subtitle">
                        <i class="fas fa-warehouse"></i>
                        {{ $stats['total_productos'] }} registrados
                    </span>
                </div>
                <span class="item-badge badge-success">Stock</span>
            </li>
            <li class="list-item">
                <div class="item-icon" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.2) 100%); color: #F59E0B;">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">Usuarios Activos</span>
                    <span class="item-subtitle">
                        <i class="fas fa-user-check"></i>
                        Sistema de salud mental
                    </span>
                </div>
                <span class="item-badge badge-warning">{{ $stats['total_usuarios'] }} total</span>
            </li>
            <li class="list-item">
                <div class="item-icon" style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.2) 100%); color: #EF4444;">
                    <i class="fas fa-ambulance"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">Casos Prioritarios</span>
                    <span class="item-subtitle">
                        <i class="fas fa-clock"></i>
                        {{ $stats['triajes_urgentes'] }} urgentes
                    </span>
                </div>
                <span class="item-badge badge-danger">Atención</span>
            </li>
        </ul>
    </div>
</div>


<div class="cards-grid">
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-history"></i>
                Triajes Recientes
            </h3>
            <a href="{{ route('admin.triajes.index') }}" class="card-link">
                Ver todos <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <ul class="item-list">
            @forelse($recentTriajes as $triaje)
            <li class="list-item">
                <div class="item-icon" style="background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(60, 179, 113, 0.2) 100%); color: var(--primary-green);">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">{{ $triaje->nombre_paciente }}</span>
                    <span class="item-subtitle">
                        <i class="fas fa-clock"></i>
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
                <div class="empty-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                <p>No hay triajes recientes</p>
            </li>
            @endforelse
        </ul>
    </div>

   
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users"></i>
                Usuarios Recientes
            </h3>
            <a href="{{ route('admin.users.index') }}" class="card-link">
                Ver todos <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <ul class="item-list">
            @forelse($recentUsers as $user)
            <li class="list-item">
                <div class="item-icon" style="background: linear-gradient(135deg, rgba(79, 195, 247, 0.1) 0%, rgba(41, 182, 246, 0.2) 100%); color: var(--sky-blue);">
                    <i class="fas fa-user"></i>
                </div>
                <div class="item-info">
                    <span class="item-title">{{ $user->name }}</span>
                    <span class="item-subtitle">
                        <i class="fas fa-envelope"></i>
                        {{ $user->email }} • {{ $user->created_at->diffForHumans() }}
                    </span>
                </div>
                <span class="item-badge badge-info">Activo</span>
            </li>
            @empty
            <li class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-users"></i>
                </div>
                <p>No hay usuarios recientes</p>
            </li>
            @endforelse
        </ul>
    </div>
</div>


<div class="dashboard-card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-box-open"></i>
            Productos Recientes
        </h3>
    </div>
    <ul class="item-list">
        @forelse($recentProducts as $product)
        @php
            // Lógica simplificada para obtener imagen
            $fallback = asset('fondos_imagenes_video/vietnam.jpg');
            $imageField = $product->photo ?? null;
            
            if ($imageField && !\Illuminate\Support\Str::startsWith($imageField, ['http://', 'https://'])) {
                $imageField = \Illuminate\Support\Facades\Storage::url($imageField);
            }
            
            $finalImage = $imageField ?: $fallback;
        @endphp
        
        <li class="list-item">
            <div class="item-icon" style="
                background-image: url('{{ $finalImage }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                width: 40px;
                height: 40px;
                border-radius: 8px;
                position: relative;
            ">
                <!-- Fallback si la imagen falla -->
                <div style="
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(135deg, rgba(16, 185, 129, 0.3) 0%, rgba(5, 150, 105, 0.4) 100%);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    border-radius: 8px;
                ">
                    <i class="fas fa-box"></i>
                </div>
            </div>
            <div class="item-info">
                <span class="item-title">{{ $product->name }}</span>
                <span class="item-subtitle">
                    <i class="fas fa-tag"></i>
                    {{ $product->category ?? 'General' }} • 
                    {{ $product->created_at->diffForHumans() }}
                </span>
            </div>
            <span class="item-badge badge-success">
                ${{ number_format($product->price, 2) }}
            </span>
        </li>
        @empty
        <li class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <p>No hay productos recientes</p>
        </li>
        @endforelse
    </ul>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
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
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)'
                ],
                borderColor: [
                    'rgb(239, 68, 68)',
                    'rgb(245, 158, 11)',
                    'rgb(139, 92, 246)',
                    'rgb(16, 185, 129)'
                ],
                borderWidth: 2,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 25,
                        usePointStyle: true,
                        font: {
                            family: "'Inter', sans-serif",
                            size: 12
                        },
                        color: 'var(--text-primary)'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.95)',
                    titleColor: 'var(--text-primary)',
                    bodyColor: 'var(--text-secondary)',
                    borderColor: 'rgba(46, 139, 87, 0.1)',
                    borderWidth: 1,
                    boxShadow: 'var(--shadow-sm)',
                    cornerRadius: 8,
                    padding: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} triajes`;
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush