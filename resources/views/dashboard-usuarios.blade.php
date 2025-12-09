@extends('layouts.user')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Resumen de tu actividad')

@push('styles')
<style>
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border: 1px solid var(--gray-200);
    }
    
    .card-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
    
    .icon-triajes { background: linear-gradient(135deg, #667eea, #764ba2); color: white; }
    .icon-productos { background: linear-gradient(135deg, #f093fb, #f5576c); color: white; }
    .icon-carrito { background: linear-gradient(135deg, #4facfe, #00f2fe); color: white; }
    .icon-nuevo { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
    
    .card-number {
        font-size: 2rem;
        font-weight: 700;
        margin: 0.5rem 0;
        color: var(--gray-800);
    }
    
    .card-title {
        font-weight: 600;
        margin-bottom: 0.25rem;
        color: var(--gray-700);
    }
    
    .card-subtitle {
        font-size: 0.85rem;
        color: var(--gray-500);
        margin-bottom: 1rem;
    }
    
    .card-btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: var(--primary);
        color: white;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: background 0.3s;
    }
    
    .card-btn:hover {
        background: var(--primary-dark);
        color: white;
    }
    
    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 2rem 0 1rem;
        color: var(--gray-800);
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--gray-200);
    }
    
    .triajes-list, .productos-list {
        display: grid;
        gap: 1rem;
    }
    
    .triaje-item, .producto-item {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        border: 1px solid var(--gray-200);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .triaje-info h4, .producto-info h4 {
        margin: 0 0 0.25rem 0;
        font-weight: 600;
        font-size: 1rem;
    }
    
    .triaje-date, .producto-categoria {
        font-size: 0.85rem;
        color: var(--gray-500);
    }
    
    .nivel-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-top: 0.5rem;
    }
    
    .badge-inmediata { background: #fee2e2; color: #dc2626; }
    .badge-prioritaria { background: #fef3c7; color: #d97706; }
    .badge-rutinaria { background: #d1fae5; color: #059669; }
    
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: var(--gray-500);
        background: white;
        border-radius: 10px;
        border: 1px solid var(--gray-200);
    }
    
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .view-all {
        text-align: right;
        margin-top: 1rem;
    }
    
    .view-all a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
    }
    
    .view-all a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')

{{-- CARDS DE RESUMEN --}}
<div class="cards-grid">
    <!-- Card 1: Triajes -->
    <div class="card">
        <div class="card-icon icon-triajes">
            <i class="fas fa-clipboard-check"></i>
        </div>
        <div class="card-number">{{ $stats['total_triajes'] ?? 0 }}</div>
        <div class="card-title">Triajes Psicológicos</div>
        <div class="card-subtitle">
            @if(($stats['triajes_hoy'] ?? 0) > 0)
                <span style="color: var(--success);">
                    <i class="fas fa-check-circle"></i> {{ $stats['triajes_hoy'] }} hoy
                </span>
            @else
                Comienza tu primer triaje
            @endif
        </div>
        <a href="{{ route('triaje.create') }}" class="card-btn">
            <i class="fas fa-plus"></i> Nuevo Triaje
        </a>
    </div>

    <!-- Card 2: Productos -->
    <div class="card">
        <div class="card-icon icon-productos">
            <i class="fas fa-store"></i>
        </div>
        <div class="card-number">{{ $recentProducts->count() ?? 0 }}</div>
        <div class="card-title">Productos Disponibles</div>
        <div class="card-subtitle">
            Descubre productos rurales
        </div>
        <a href="{{ route('products.index') }}" class="card-btn">
            <i class="fas fa-shopping-basket"></i> Ver Productos
        </a>
    </div>

    <!-- Card 3: Carrito -->
    <div class="card">
        <div class="card-icon icon-carrito">
            <i class="fas fa-shopping-cart"></i>
        </div>
        @php
            // Carrito desde sesión
            $carritoCount = 0;
            $carritoTotal = 0;
            if(session('cart')) {
                $carrito = session('cart');
                $carritoCount = count($carrito);
                foreach ($carrito as $item) {
                    $carritoTotal += ($item['price'] * $item['quantity']);
                }
            }
        @endphp
        <div class="card-number">{{ $carritoCount }}</div>
        <div class="card-title">Mi Carrito</div>
        <div class="card-subtitle">
            @if($carritoCount > 0)
                <span style="font-weight: 600; color: var(--primary-dark);">
                    ${{ number_format($carritoTotal, 0, ',', '.') }}
                </span>
            @else
                Carrito vacío
            @endif
        </div>
        <a href="{{ route('checkout') }}" class="card-btn">
            <i class="fas fa-arrow-right"></i> Ver Carrito
        </a>
    </div>

    <!-- Card 4: Acción rápida -->
    <div class="card" style="border: 2px solid var(--primary);">
        <div class="card-icon icon-nuevo">
            <i class="fas fa-bolt"></i>
        </div>
        <div class="card-title" style="color: var(--primary);">Acción Rápida</div>
        <div class="card-subtitle">¿Qué necesitas hacer?</div>
        <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-top: 1rem;">
            <a href="{{ route('triaje.create') }}" 
               style="padding: 0.5rem; background: var(--primary-light); color: var(--primary); border-radius: 6px; text-decoration: none; text-align: center; font-size: 0.9rem;">
                <i class="fas fa-plus-circle"></i> Crear Triaje
            </a>
            <a href="{{ route('products.index') }}" 
               style="padding: 0.5rem; background: var(--primary-light); color: var(--primary); border-radius: 6px; text-decoration: none; text-align: center; font-size: 0.9rem;">
                <i class="fas fa-shopping-basket"></i> Comprar Productos
            </a>
        </div>
    </div>
</div>

{{-- SECCIÓN: TRIAJES RECIENTES --}}
<h3 class="section-title">
    <i class="fas fa-history"></i> Triajes Recientes
</h3>

@if(isset($recentTriajes) && $recentTriajes->count() > 0)
    <div class="triajes-list">
        @foreach($recentTriajes as $triaje)
            <div class="triaje-item">
                <div class="triaje-info">
                    <h4>{{ $triaje->nombre_paciente ?? 'Triaje psicológico' }}</h4>
                    <div class="triaje-date">
                        <i class="fas fa-calendar"></i> {{ $triaje->created_at->format('d/m/Y H:i') }}
                    </div>
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
                        <span class="nivel-badge {{ $badgeClass }}">
                            {{ $triaje->nivel_atencion }}
                        </span>
                    @endif
                </div>
                <div>
                    <a href="{{ route('triaje.show', $triaje->id) }}" 
                       style="padding: 0.4rem 0.8rem; background: var(--gray-100); color: var(--gray-700); border-radius: 6px; text-decoration: none; font-size: 0.85rem;">
                        Ver
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="view-all">
        <a href="{{ route('mis.triajes') }}">
            Ver todos mis triajes <i class="fas fa-arrow-right"></i>
        </a>
    </div>
@else
    <div class="empty-state">
        <i class="fas fa-clipboard-list"></i>
        <h3 style="color: var(--gray-600); margin-bottom: 0.5rem;">No has realizado ningún triaje</h3>
        <p style="margin-bottom: 1.5rem;">Comienza evaluando tu salud mental</p>
        <a href="{{ route('triaje.create') }}" class="card-btn">
            <i class="fas fa-plus"></i> Crear Primer Triaje
        </a>
    </div>
@endif

{{-- SECCIÓN: PRODUCTOS RECOMENDADOS --}}
<h3 class="section-title" style="margin-top: 3rem;">
    <i class="fas fa-star"></i> Productos Destacados
</h3>

@if(isset($recentProducts) && $recentProducts->count() > 0)
    <div class="productos-list">
        @foreach($recentProducts as $producto)
            <div class="producto-item">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    @if($producto->imagen_url)
                        <img src="{{ $producto->imagen_url }}" 
                             alt="{{ $producto->nombre }}"
                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                    @else
                        <div style="width: 50px; height: 50px; background: var(--gray-200); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: var(--gray-400);">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                    <div class="producto-info">
                        <h4>{{ $producto->nombre }}</h4>
                        <div class="producto-categoria">
                            {{ $producto->categoria ?? 'General' }}
                        </div>
                        <div style="font-weight: 600; color: var(--primary-dark); margin-top: 0.25rem;">
                            ${{ number_format($producto->precio, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('products.show', $producto->id) }}" 
                       style="padding: 0.4rem 0.8rem; background: var(--primary); color: white; border-radius: 6px; text-decoration: none; font-size: 0.85rem;">
                        Ver Producto
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="view-all">
        <a href="{{ route('products.index') }}">
            Ver todos los productos <i class="fas fa-arrow-right"></i>
        </a>
    </div>
@else
    <div class="empty-state">
        <i class="fas fa-store"></i>
        <h3 style="color: var(--gray-600); margin-bottom: 0.5rem;">No hay productos disponibles</h3>
        <p>Pronto tendremos productos para ti</p>
    </div>
@endif

{{-- ESTADO DEL CARRITO --}}
@if($carritoCount > 0)
    <div style="margin-top: 3rem; padding: 1.5rem; background: linear-gradient(135deg, var(--primary-light), #e3f2fd); border-radius: 10px; border: 1px solid var(--primary);">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="color: var(--primary-dark); margin-bottom: 0.5rem;">
                    <i class="fas fa-shopping-cart"></i> Tienes {{ $carritoCount }} producto(s) en el carrito
                </h3>
                <p style="color: var(--gray-600); font-size: 0.9rem;">
                    Total: <span style="font-weight: 600; font-size: 1.1rem; color: var(--primary-dark);">
                        ${{ number_format($carritoTotal, 0, ',', '.') }}
                    </span>
                </p>
            </div>
            <div>
                <a href="{{ route('checkout') }}" 
                   style="padding: 0.75rem 1.5rem; background: var(--primary); color: white; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-block;">
                    <i class="fas fa-credit-card"></i> Proceder al Pago
                </a>
            </div>
        </div>
    </div>
@endif

@endsection