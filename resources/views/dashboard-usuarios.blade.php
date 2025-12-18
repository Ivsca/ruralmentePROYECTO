@extends('layouts.user')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Resumen de tu actividad')

@push('styles')
<style>
   
    :root {
        --card-radius: 16px;
        --card-padding: 1.75rem;
        --transition-smooth: all 0.3s ease;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.75rem;
        margin-bottom: 3rem;
    }
    
    .card {
        background: var(--bg-card);
        border-radius: var(--card-radius);
        padding: var(--card-padding);
        border: 1px solid rgba(46, 139, 87, 0.1);
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--green-gradient);
        border-radius: var(--card-radius) var(--card-radius) 0 0;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(46, 139, 87, 0.2);
    }
    
    .card-icon {
        width: 60px;
        height: 60px;
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.25rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: var(--transition-smooth);
    }

    .card:hover .card-icon {
        transform: scale(1.05) rotate(5deg);
    }

    
    .icon-triajes { 
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
        color: white; 
    }
    
    .icon-productos { 
        background: linear-gradient(135deg, #48BB78 0%, #2E8B57 100%); 
        color: white; 
    }
    
    .icon-carrito { 
        background: linear-gradient(135deg, #4FC3F7 0%, #29B6F6 100%); 
        color: white; 
    }
    
    .icon-nuevo { 
        background: linear-gradient(135deg, var(--warm-orange) 0%, var(--warm-yellow) 100%); 
        color: white; 
    }
    
    .card-number {
        font-size: 2.5rem;
        font-weight: 800;
        margin: 0.5rem 0;
        color: var(--text-primary);
        font-family: 'Poppins', sans-serif;
    }
    
    .card-title {
        font-weight: 600;
        margin-bottom: 0.25rem;
        color: var(--text-secondary);
        font-size: 1rem;
    }
    
    .card-subtitle {
        font-size: 0.9rem;
        color: var(--text-light);
        margin-bottom: 1.5rem;
        min-height: 40px;
        display: flex;
        align-items: center;
    }
    
    .card-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: var(--green-gradient);
        color: white;
        border-radius: var(--radius-full);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: var(--transition-smooth);
        border: none;
        cursor: pointer;
        width: 100%;
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.2);
    }
    
    .card-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(46, 139, 87, 0.3);
        color: white;
    }

   
    .card-rapida {
        border: 2px solid var(--warm-orange);
        background: linear-gradient(135deg, rgba(255, 167, 38, 0.05) 0%, rgba(255, 255, 255, 1) 100%);
    }

    .card-rapida::before {
        background: var(--warm-gradient);
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 3rem 0 1.5rem;
        color: var(--text-primary);
        padding-bottom: 0.75rem;
        border-bottom: 2px solid rgba(46, 139, 87, 0.1);
        position: relative;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 80px;
        height: 2px;
        background: var(--green-gradient);
        border-radius: var(--radius-full);
    }
    
    .triajes-list, .productos-list {
        display: grid;
        gap: 1rem;
    }
    
    .triaje-item, .producto-item {
        background: var(--bg-card);
        border-radius: var(--radius-md);
        padding: 1.25rem;
        border: 1px solid rgba(46, 139, 87, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-sm);
    }

    .triaje-item:hover, .producto-item:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
        border-color: rgba(46, 139, 87, 0.2);
    }
    
    .triaje-info h4, .producto-info h4 {
        margin: 0 0 0.5rem 0;
        font-weight: 600;
        font-size: 1.05rem;
        color: var(--text-primary);
    }
    
    .triaje-date, .producto-categoria {
        font-size: 0.85rem;
        color: var(--text-light);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .nivel-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 1rem;
        border-radius: var(--radius-full);
        font-size: 0.8rem;
        font-weight: 600;
        margin-top: 0.75rem;
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
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--text-light);
        background: var(--bg-card);
        border-radius: var(--card-radius);
        border: 2px dashed rgba(46, 139, 87, 0.2);
        transition: var(--transition-smooth);
    }

    .empty-state:hover {
        border-color: rgba(46, 139, 87, 0.3);
        transform: translateY(-2px);
    }
    
    .empty-state i {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        opacity: 0.5;
        color: var(--primary-green);
    }
    
    .view-all {
        text-align: right;
        margin-top: 1.5rem;
    }
    
    .view-all a {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-green);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-full);
        background: rgba(46, 139, 87, 0.1);
        transition: var(--transition-smooth);
    }
    
    .view-all a:hover {
        background: var(--primary-green);
        color: white;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.2);
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
        border: 1px solid rgba(46, 139, 87, 0.2);
    }

    .action-btn-primary {
        background: var(--green-gradient);
        color: white;
        box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
    }

    .action-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(46, 139, 87, 0.3);
        color: white;
    }

    .action-btn-secondary {
        background: var(--bg-card);
        color: var(--primary-green);
    }

    .action-btn-secondary:hover {
        background: rgba(46, 139, 87, 0.1);
        transform: translateY(-2px);
        border-color: var(--primary-green);
    }

    
    .producto-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: var(--radius-md);
        border: 2px solid white;
        box-shadow: var(--shadow-sm);
    }

    .producto-img-placeholder {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #E5E7EB 0%, #D1D5DB 100%);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-400);
        font-size: 1.25rem;
    }

    
    .carrito-section {
        margin-top: 3rem;
        padding: 2rem;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.05) 0%, rgba(41, 182, 246, 0.05) 100%);
        border-radius: var(--card-radius);
        border: 1px solid rgba(46, 139, 87, 0.2);
        position: relative;
        overflow: hidden;
    }

    .carrito-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%232E8B57' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .carrito-content {
        position: relative;
        z-index: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .cards-grid {
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }
        
        .card {
            padding: 1.5rem;
        }
        
        .triaje-item, .producto-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .section-title {
            font-size: 1.3rem;
            margin: 2rem 0 1rem;
        }
        
        .carrito-section {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')

<div class="cards-grid">
    
    <div class="card">
        <div class="card-icon icon-triajes">
            <i class="fas fa-clipboard-check"></i>
        </div>
        <div class="card-number">{{ $stats['total_triajes'] ?? 0 }}</div>
        <div class="card-title">Triajes Psicológicos</div>
        <div class="card-subtitle">
            @if(($stats['triajes_hoy'] ?? 0) > 0)
                <span style="display: flex; align-items: center; gap: 0.5rem; color: var(--success); font-weight: 500;">
                    <i class="fas fa-check-circle"></i> {{ $stats['triajes_hoy'] }} realizado(s) hoy
                </span>
            @else
                <span style="color: var(--text-light);">
                    Comienza tu primer triaje
                </span>
            @endif
        </div>
    </div>

    
    <div class="card">
        <div class="card-icon icon-productos">
            <i class="fas fa-store"></i>
        </div>
        <div class="card-number">{{ $recentProducts->count() ?? 0 }}</div>
        <div class="card-title">Productos Disponibles</div>
        <div class="card-subtitle">
            Descubre productos rurales frescos y naturales
        </div>
    </div>

    
    <div class="card">
        <div class="card-icon icon-carrito">
            <i class="fas fa-shopping-cart"></i>
        </div>
        @php
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
        <div class="card-title">Mi Carrito </div>
        <div class="card-subtitle">
            @if($carritoCount > 0)
                <span style="font-weight: 600; color: var(--primary-green); font-size: 1.1rem;">
                    ${{ number_format($carritoTotal, 0, ',', '.') }}
                </span>
            @else
                <span style="color: var(--text-light);">
                    Carrito vacío
                </span>
            @endif
        </div>
        <a href="{{ route('checkout') }}" class="card-btn">
            <i class="fas fa-arrow-right"></i> Ver Carrito
        </a>
    </div>

    
    <div class="card card-rapida">
        <div class="card-icon icon-nuevo">
            <i class="fas fa-bolt"></i>
        </div>
        <div class="card-title" style="color: var(--warm-orange); font-weight: 700; font-size: 1.1rem;">
            Acción Rápida
        </div>
        <div class="card-subtitle">
            ¿Qué necesitas hacer ahora?
        </div>
        <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-top: 1rem;">
            <a href="{{ route('triaje.create') }}" class="action-btn action-btn-primary">
                <i class="fas fa-plus-circle"></i> Crear Nuevo Triaje
            </a>
            <a href="{{ route('products.index') }}" class="action-btn action-btn-secondary">
                <i class="fas fa-shopping-basket"></i> Explorar Productos
            </a>
        </div>
    </div>
</div>


<h3 class="section-title">
    <i class="fas fa-history" style="color: var(--primary-green);"></i> 
    Triajes Recientes
</h3>

@if(isset($recentTriajes) && $recentTriajes->count() > 0)
    <div class="triajes-list">
        @foreach($recentTriajes as $triaje)
            <div class="triaje-item">
                <div class="triaje-info">
                    <h4>{{ $triaje->nombre_paciente ?? 'Triaje psicológico' }}</h4>
                    <div class="triaje-date">
                        <i class="fas fa-calendar" style="color: var(--primary-green);"></i> 
                        {{ $triaje->created_at->format('d/m/Y H:i') }}
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
                            <i class="fas fa-flag"></i> {{ $triaje->nivel_atencion }}
                        </span>
                    @endif
                </div>
                <div>
                    <a href="{{ route('triaje.show', $triaje->id) }}" class="action-btn action-btn-secondary">
                        <i class="fas fa-eye"></i> Ver Detalles
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
        <h3 style="color: var(--text-primary); margin-bottom: 0.75rem; font-size: 1.25rem;">
            No has realizado ningún triaje
        </h3>
        <p style="margin-bottom: 1.5rem; font-size: 0.95rem;">
            Comienza evaluando tu salud mental para recibir recomendaciones personalizadas
        </p>
        <a href="{{ route('triaje.create') }}" class="card-btn" style="width: auto; padding: 0.75rem 2rem;">
            <i class="fas fa-plus"></i> Crear Primer Triaje
        </a>
    </div>
@endif


<h3 class="section-title" style="margin-top: 3rem;">
    <i class="fas fa-star" style="color: var(--warm-orange);"></i> 
    Productos Destacados
</h3>

@if(isset($recentProducts) && $recentProducts->count() > 0)
    <div class="productos-list">
        @foreach($recentProducts as $producto)
            @php
                // Lógica para obtener la imagen correctamente
                $fallback = asset('fondos_imagenes_video/vietnam.jpg');
                $imageUrl = null;
                
                // Verifica si existe el campo de imagen (puede ser 'photo' o 'imagen_url')
                $imageField = $producto->photo ?? $producto->imagen_url ?? null;
                
                if ($imageField) {
                    // Verificar si es una URL absoluta
                    if (\Illuminate\Support\Str::startsWith($imageField, ['http://', 'https://'])) {
                        $imageUrl = $imageField;
                    } else {
                        // Intentar obtener desde storage
                        try {
                            $imageUrl = \Illuminate\Support\Facades\Storage::url($imageField);
                        } catch (\Exception $e) {
                            $imageUrl = null;
                        }
                    }
                }
            @endphp
            
            <div class="producto-item">
                <div style="display: flex; align-items: center; gap: 1.25rem;">
                    @if($imageUrl)
                        <img src="{{ $imageUrl }}" 
                             alt="{{ $producto->nombre }}"
                             class="producto-img"
                             onerror="this.src='{{ $fallback }}'">
                    @else
                        <div class="producto-img-placeholder" style="background-image: url('{{ $fallback }}'); background-size: cover; background-position: center;">
                            <i class="fas fa-leaf"></i>
                        </div>
                    @endif
                    <div class="producto-info">
                        <h4>{{ $producto->nombre ?? $producto->name }}</h4>
                        <div class="producto-categoria">
                            <i class="fas fa-tag" style="color: var(--text-light);"></i>
                            {{ $producto->categoria ?? $producto->category ?? 'General' }}
                        </div>
                        <div style="font-weight: 700; color: var(--primary-green); font-size: 1.1rem; margin-top: 0.5rem;">
                            ${{ number_format($producto->precio ?? $producto->price ?? 0, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('products.show', $producto->id) }}" class="action-btn action-btn-primary">
                        <i class="fas fa-store"></i> Ver Producto
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
        <h3 style="color: var(--text-primary); margin-bottom: 0.75rem; font-size: 1.25rem;">
            No hay productos disponibles
        </h3>
        <p style="font-size: 0.95rem;">
            Pronto tendremos productos rurales frescos para ti
        </p>
    </div>
@endif


@if($carritoCount > 0)
    <div class="carrito-section">
        <div class="carrito-content" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="color: var(--primary-green); margin-bottom: 0.75rem; font-size: 1.3rem; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-shopping-cart"></i> 
                    Tienes {{ $carritoCount }} producto(s) en el carrito
                </h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem;">
                    Total a pagar: 
                    <span style="font-weight: 700; font-size: 1.4rem; color: var(--primary-green); margin-left: 0.5rem;">
                        ${{ number_format($carritoTotal, 0, ',', '.') }}
                    </span>
                </p>
            </div>
            <div>
                <a href="{{ route('checkout') }}" class="action-btn action-btn-primary" style="padding: 0.85rem 2rem; font-size: 1rem;">
                    <i class="fas fa-credit-card"></i> Proceder al Pago
                </a>
            </div>
        </div>
    </div>
@endif

@endsection