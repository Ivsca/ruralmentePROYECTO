<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false"/>

    <!-- Barra flotante del carrito -->
    <div class="carrito-fijo">
        <div class="carrito-icono">
            <i class="bi bi-cart3"></i>
            <span class="contador-carrito">0</span>
        </div>
    </div>

    @php
        // Obtén el id del usuario (null si no está autenticado)
        $userId = auth()->id();
    @endphp

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Font Awesome para iconos adicionales -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* CORRECCIÓN PARA SUPRIMIR SUBRAYADOS DE BOOTSTRAP */
        x-guest-layout a,
        x-navbar-welcome a,
        x-footer a,
        header a,
        footer a,
        .navbar a,
        [class*="nav"] a {
            text-decoration: none !important;
        }

        /* También para enlaces específicos de Bootstrap */
        a:not([class]) {
            text-decoration: none !important;
        }

        .carrito-fijo {
            position: fixed;
            top: 15px;
            right: 20px;
            z-index: 9999;
        }

        .carrito-icono {
            position: relative;
            background: #0d6efd;
            color: white;
            padding: 12px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            transition: transform .2s;
        }

        .carrito-icono:hover {
            transform: scale(1.1);
        }

        .contador-carrito {
            position: absolute;
            top: -6px;
            right: -6px;
            background: red;
            color: white;
            font-size: 13px;
            padding: 2px 6px;
            border-radius: 50%;
            font-weight: bold;
        }

        /* Estilos de las Cards (SIN TOCAR) */
        .product-card {
            transition: all 0.3s ease;
            border: none;
            height: 100%;
            background: #fff;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15) !important;
        }
        
        .product-image-container {
            position: relative;
            height: 250px;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .product-card:hover .product-image {
            transform: scale(1.08);
        }
        
        .badge-stock {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .price-tag {
            font-size: 1.75rem;
            font-weight: 700;
            color: #16a34a;
            letter-spacing: -0.5px;
        }
        
        .btn-add-cart {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-add-cart:hover {
            background: linear-gradient(135deg, #15803d 0%, #166534 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(22, 163, 74, 0.3);
        }
        
        .btn-view-more {
            border: 2px solid #e5e7eb;
            color: #374151;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-view-more:hover {
            border-color: #16a34a;
            color: #16a34a;
            background: #f0fdf4;
        }
        
        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
            min-height: 2.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .product-description {
            color: #6b7280;
            font-size: 0.875rem;
            min-height: 3rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }
        
        .empty-state-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            color: #d1d5db;
        }

        /* NUEVOS ESTILOS PARA EL FILTRO MEJORADO */
        .filter-section {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .search-bar-container {
            background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 100%);
            padding: 1.5rem;
        }

        .search-input-group {
            display: flex;
            gap: 0.75rem;
            align-items: stretch;
        }

        .search-input {
            flex: 1;
            border: none;
            border-radius: 12px;
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            background: white;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            transform: translateY(-1px);
            border: 2px solid #2E7D32;
        }

        .btn-search, .btn-filter-toggle {
            border: none;
            border-radius: 12px;
            padding: 0.875rem 1.75rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-search {
            background: #16a34a;
            color: white;
            border: 2px solid transparent;
        }

        .btn-search:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(22, 163, 74, 0.3);
            border-color: white;
        }

        .btn-filter-toggle {
            background: rgba(255,255,255,0.95);
            color: #2E7D32;
            border: 2px solid transparent;
        }

        .btn-filter-toggle:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
            border-color: #2E7D32;
        }

        .btn-filter-toggle i {
            transition: transform 0.3s ease;
        }

        .btn-filter-toggle.active i {
            transform: rotate(180deg);
        }

        .filters-container {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
            background: #f9fafb;
        }

        .filters-container.show {
            max-height: 500px;
            padding: 1.5rem;
            border-top: 2px solid #e5e7eb;
        }

        .filter-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-label i {
            color: #2E7D32;
        }

        .filter-select {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
            cursor: pointer;
            width: 100%;
        }

        .filter-select:focus {
            border-color: #2E7D32;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.1);
            outline: none;
        }

        .btn-clear-filters {
            background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .btn-clear-filters:hover {
            background: linear-gradient(135deg, #145214 0%, #1B5E20 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(27, 94, 32, 0.4);
            border-color: white;
        }

        .btn-apply-filters {
            background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .btn-apply-filters:hover {
            background: linear-gradient(135deg, #145214 0%, #1B5E20 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(27, 94, 32, 0.4);
            border-color: white;
        }

        .filter-actions {
            display: flex;
            justify-content: center; 
            align-items: center;
            gap: 1rem; 
        }

        @media (max-width: 768px) {
            .search-input-group {
                flex-direction: column;
            }

            .btn-search, .btn-filter-toggle {
                width: 100%;
                justify-content: center;
            }
            
            .filters-container.show {
                padding: 1rem;
            }

            .filter-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Estilos para la sección principal */
        .carrito-fijo {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .carrito-icono {
            position: relative;
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: white;
            padding: 14px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
            transition: all 0.3s ease;
            border: 2px solid white;
        }

        .carrito-icono:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 16px rgba(22, 163, 74, 0.4);
        }

        .contador-carrito {
            position: absolute;
            top: -6px;
            right: -6px;
            background: #dc2626;
            color: white;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 50%;
            font-weight: bold;
            border: 2px solid white;
            min-width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Utilidades */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .group.bg-white.rounded-2xl {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .group.bg-white.rounded-2xl:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .group\/btn {
            transition: all 0.3s ease;
        }
        
        .group\/btn:hover {
            background: #f1f5f9;
            border-color: #2E7D32;
            color: #2E7D32;
        }
        
        .group\/cart {
            transition: all 0.3s ease;
        }
        
        .group\/cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(22, 163, 74, 0.3);
        }
    </style>

    <main>
        <div class="max-w-7xl mx-auto mb-10 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="text-center md:text-left mb-6 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-serif font-bold tracking-wide mb-4 bg-gradient-to-r from-green-800 via-emerald-700 to-teal-800 bg-clip-text text-transparent">
                        Nuestros Productos
                    </h1>
                    <p class="text-gray-600 text-lg max-w-2xl">
                        Descubre productos frescos y naturales directamente del campo colombiano
                    </p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg px-6 py-3 border-l-4 border-emerald-500">
                    <span class="text-2xl font-bold text-gray-800">{{ $products->count() }}</span>
                    <span class="text-gray-600 ml-2">productos disponibles</span>
                </div>
            </div>
            
            <!-- Sección de filtros -->
            <div class="filter-section mb-12">
                <!-- Barra de búsqueda principal -->
                <div class="search-bar-container">
                    <form method="GET" action="{{ route('searchProducts') }}" id="mainFilterForm">
                        <div class="search-input-group">
                            <input 
                                type="text" 
                                class="search-input" 
                                name="search" 
                                placeholder="¿Qué producto estás buscando?..."
                                value="{{ request('search') }}"
                            >
                            <button type="submit" class="btn-search">
                                <i class="bi bi-search"></i>
                                <span>Buscar</span>
                            </button>
                            <button type="button" class="btn-filter-toggle" id="toggleFilters">
                                <i class="bi bi-sliders"></i>
                                <span>Filtros</span>
                            </button>
                        </div>

                        <!-- Filtros adicionales (colapsables) -->
                        <div class="filters-container" id="filtersContainer">
                            <div class="row g-3">
                                
                                <!-- Filtro por categoría -->
                                <div class="col-md-4">
                                    <label class="filter-label">
                                        <i class="bi bi-tag-fill"></i>
                                        Categoría
                                    </label>
                                    <select class="form-select filter-select" name="category">
                                        <option value="">Todas las categorías</option>
                                        @php
                                            $categories = \App\Models\Product::distinct()->pluck('category')->filter();
                                        @endphp
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                                {{ $cat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Filtro por precio -->
                                <div class="col-md-4">
                                    <label class="filter-label">
                                        <i class="bi bi-cash-stack"></i>
                                        Ordenar por precio
                                    </label>
                                    <select class="form-select filter-select" name="price_order">
                                        <option value="">Sin orden específico</option>
                                        <option value="asc" {{ request('price_order') == 'asc' ? 'selected' : '' }}>
                                            Precio: Menor a Mayor
                                        </option>
                                        <option value="desc" {{ request('price_order') == 'desc' ? 'selected' : '' }}>
                                            Precio: Mayor a Menor
                                        </option>
                                    </select>
                                </div>

                                <!-- Botones de acción -->
                                <div class="col-md-4">
                                    <label class="filter-label" style="opacity: 0;">Acciones</label>
                                    <div class="filter-actions">
                                        <button type="submit" class="btn-apply-filters">
                                            <i class="bi bi-check-circle"></i>
                                            Aplicar
                                        </button>

                                        <button
                                            type="button"
                                            onclick="window.location='{{ route('products.index') }}'"
                                            class="btn-clear-filters"
                                        >
                                            <i class="bi bi-x-circle"></i>
                                            Limpiar
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Grid de productos -->
            <div class="max-w-7xl mx-auto">
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                        @foreach($products as $product)
                            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                <div class="relative h-64 overflow-hidden bg-gradient-to-br from-emerald-50 to-teal-50">
                                    @php
                                        $fallback = asset('fondos_imagenes_video/vietnam.jpg');
                                        $imageUrl = null;
                                        if ($product->photo) {
                                            $imageUrl = Str::startsWith($product->photo, ['http', 'https'])
                                                ? $product->photo
                                                : Storage::url($product->photo);
                                        }
                                    @endphp

                                    <img 
                                        src="{{ $imageUrl ?? $fallback }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        alt="{{ $product->name }}"
                                        onerror="this.src='{{ $fallback }}'"
                                    >
                                    
                                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                                        <div class="flex items-center gap-2">
                                            <i class="bi bi-box-seam text-emerald-600"></i>
                                            <span class="font-semibold text-gray-800">Stock: {{ $product->stock ?? 0 }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-emerald-700 transition-colors line-clamp-2">
                                        {{ $product->name }}
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-4 line-clamp-2 leading-relaxed">
                                        {{ \Illuminate\Support\Str::limit($product->description ?? 'Sin descripción', 80) }}
                                    </p>

                                    <div class="mb-6">
                                        <span class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text text-transparent">
                                            ${{ number_format($product->price ?? 0, 0) }}
                                        </span>
                                    </div>

                                    <div class="space-y-3">
                                        <a 
                                            href="{{ route('products.show', $product->id) }}" 
                                            class="block w-full bg-gray-50 hover:bg-gray-100 text-gray-800 font-semibold py-3 px-4 rounded-xl border border-gray-200 transition-all duration-300 flex items-center justify-center gap-2 group/btn"
                                        >
                                            <i class="bi bi-eye group-hover/btn:translate-x-1 transition-transform"></i>
                                            Ver detalles
                                        </a>

                                        <form method="POST" action="{{ route('carrito.add', $product->id) }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group/cart">
                                                <i class="bi bi-basket3 group-hover/cart:scale-110 transition-transform"></i>
                                                Agregar al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gradient-to-br from-white to-emerald-50 rounded-2xl shadow-xl p-12 max-w-2xl mx-auto text-center border border-gray-100">
                        <div class="mb-8">
                            <div class="bg-emerald-100 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="bi bi-search text-emerald-600 text-4xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-3">No se encontraron productos</h2>
                            <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">
                                No hay productos que coincidan con tu búsqueda. Intenta con otros filtros.
                            </p>
                        </div>
                        
                        <a href="{{ route('products.index') }}" 
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                            <i class="bi bi-arrow-clockwise"></i>
                            Ver todos los productos
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script>
        // Inyectamos el ID del servidor al JS de forma segura
        const USER_ID = @json($userId); // null si no hay sesión

        (async function cantidad_productos_carrito() {
            const contador = document.querySelector('.contador-carrito');
            if (!contador) return;

            // Si no hay usuario autenticado, mostrar 0 y salir (evita llamadas innecesarias)
            if (!USER_ID) {
                contador.textContent = '0';
                return;
            }

            try {
                // Construimos la URL en base a tu endpoint
                const urlBase = "{{ url('/cantidad-productos-carrito') }}";
                const response = await fetch(`${urlBase}/${USER_ID}`, {
                    headers: { 'Accept': 'application/json' }
                });

                if (!response.ok) {
                    console.error('Fetch error: ', response.status);
                    return;
                }

                const data = await response.json();
                contador.textContent = (data && data.cantidad) ? data.cantidad : '0';
            } catch (err) {
                console.error('Error al obtener cantidad del carrito:', err);
            }
        })();

        // Evento para mostrar/ocultar filtros
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleFilters');
            const filtersContainer = document.getElementById('filtersContainer');
            
            if (toggleBtn && filtersContainer) {
                toggleBtn.addEventListener('click', function() {
                    filtersContainer.classList.toggle('show');
                    toggleBtn.classList.toggle('active');
                });
            }
            
            // Ejecutar al cargar la página
            cantidad_productos_carrito();
        });
    </script>
    
    <x-footer />
</x-guest-layout>