<x-guest-layout>

<!-- Barra flotante del carrito -->
<div class="carrito-fijo">
    <div class="carrito-icono">
        <i class="bi bi-cart3"></i>
        <span class="contador-carrito">0</span>
    </div>
</div>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
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
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    }

    .search-input:focus {
      outline: none;
      box-shadow: 0 4px 16px rgba(0,0,0,0.15);
      transform: translateY(-1px);
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
    }

    .btn-search:hover {
      background: #15803d;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(22, 163, 74, 0.3);
    }

    .btn-filter-toggle {
      background: rgba(255,255,255,0.95);
      color: #667eea;
    }

    .btn-filter-toggle:hover {
      background: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
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
      color: #667eea;
    }

    .filter-select {
      border: 2px solid #e5e7eb;
      border-radius: 10px;
      padding: 0.75rem;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    .filter-select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      outline: none;
    }

    .btn-clear-filters {
      background: transparent;
      border: 2px solid #ef4444;
      color: #ef4444;
      border-radius: 10px;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      justify-content: center;
    }

    .btn-clear-filters:hover {
      background: #ef4444;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .btn-apply-filters {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    }

    .btn-apply-filters:hover {
      background: linear-gradient(135deg, #5568d3 0%, #653a8a 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    }

    @media (max-width: 768px) {
      .search-input-group {
        flex-direction: column;
      }

      .btn-search, .btn-filter-toggle {
        width: 100%;
        justify-content: center;
      }
    }
  </style>

  <div class="container py-5">
    
    <!-- Título y contador -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="display-5 fw-bold">Nuestros Productos</h1>
      <span class="badge bg-primary fs-6">{{ $products->count() }} productos</span>
    </div>

    <!-- Sección de filtros mejorada -->
    <div class="filter-section">
      
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
                <div class="d-flex gap-2">
                  <button type="submit" class="btn-apply-filters flex-grow-1">
                    <i class="bi bi-check-circle"></i>
                    Aplicar
                  </button>
                  <a href="{{ route('products.index') }}" class="btn-clear-filters flex-grow-1">
                    <i class="bi bi-x-circle"></i>
                    Limpiar
                  </a>
                </div>
              </div>

            </div>
          </div>

        </form>
      </div>

    </div>

    <!-- Grid de productos (SIN CAMBIOS) -->
    @forelse($products as $product)
      @if($loop->first || $loop->index % 4 == 0)
        <div class="row g-4 mb-4">
      @endif

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card product-card shadow-sm h-100">
            
            <!-- Imagen del producto -->
          <div class="product-image-container">
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
                  class="product-image"
                  alt="{{ $product->name }}"
                  onerror="this.src='{{ $fallback }}'"
              >

              <span class="badge-stock">
                  <i class="bi bi-box-seam"></i> Stock: {{ $product->stock ?? 0 }}
              </span>
          </div>

            <!-- Contenido de la card -->
            <div class="card-body d-flex flex-column">
              
              <h5 class="product-title">{{ $product->name }}</h5>
              
              <p class="product-description">
                {{ \Illuminate\Support\Str::limit($product->description ?? 'Sin descripción', 80) }}
              </p>

              <div class="mt-auto">
                <!-- Precio -->
                <div class="mb-3">
                  <span class="price-tag">$ {{ number_format($product->price ?? 0, 0) }}</span>
                </div>

                <!-- Botones -->
                <div class="d-grid gap-2">
                  <a 
                    href="{{ route('products.show', $product->id) }}" 
                    class="btn btn-view-more"
                  >
                    <i class="bi bi-eye"></i> Ver detalles
                  </a>

                  <form method="POST" action="{{ route('addCarrito') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn btn-add-cart text-white w-100">
                      <i class="bi bi-cart-plus"></i> Agregar al carrito
                    </button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

      @if($loop->last || ($loop->index + 1) % 4 == 0)
        </div>
      @endif

    @empty
      <div class="empty-state">
        <svg class="empty-state-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        </svg>
        <h2 class="h3 fw-semibold mb-3">No se encontraron productos</h2>
        <p class="text-muted">
          No hay productos que coincidan con tu búsqueda. Intenta con otros filtros.
        </p>
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">
          <i class="bi bi-arrow-clockwise"></i> Ver todos los productos
        </a>
      </div>
    @endforelse

  </div>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script para toggle de filtros -->


  <script>
    async function cantidad_productos_carrito() {
        const response = await fetch('/cantidad-productos-carrito');
        const data = await response.json();
        document.querySelector('.contador-carrito').textContent = data.cantidad;
      }

      // Llamarlo al cargar la página
      cantidad_productos_carrito(); 
      
    document.addEventListener('DOMContentLoaded', function() {
      const toggleBtn = document.getElementById('toggleFilters');
      const filtersContainer = document.getElementById('filtersContainer');
      
      toggleBtn.addEventListener('click', function() {
        filtersContainer.classList.toggle('show');
        toggleBtn.classList.toggle('active');
      });
    });
  </script>

</x-guest-layout>