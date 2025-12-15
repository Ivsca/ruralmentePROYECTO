<x-guest-layout>
  <x-navbar-welcome :seeButton="2" :register="false"/>

  <style>
    
    .product-detail-container {
      background: linear-gradient(135deg, #f8faf7 0%, #f0f5ee 100%);
      min-height: 100vh;
      padding-top: 2rem;
    }

    .product-image-gallery {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .product-image-gallery:hover {
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .main-image {
      width: 100%;
      height: 500px;
      object-fit: cover;
      border-radius: 15px;
      background: linear-gradient(135deg, #f0f7f0 0%, #e8f4e8 100%);
    }

    .product-info-card {
      background: white;
      border-radius: 20px;
      padding: 2.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      height: fit-content;
    }

    .product-title {
      font-size: 2.8rem;
      font-weight: 800;
      color: #1a472a;
      line-height: 1.2;
      margin-bottom: 1.5rem;
      background: linear-gradient(135deg, #1a472a 0%, #2e8b57 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .price-tag {
      font-size: 3rem;
      font-weight: 800;
      color: #16a34a;
      margin: 1.5rem 0;
      position: relative;
      display: inline-block;
    }

    .price-tag::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, #16a34a, #22c55e);
      border-radius: 2px;
    }

    .product-details-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
      margin: 2rem 0;
      padding: 2rem;
      background: linear-gradient(135deg, #f0f9f0 0%, #e8f5e9 100%);
      border-radius: 15px;
      border: 1px solid rgba(22, 163, 74, 0.1);
    }

    .detail-item {
      background: white;
      padding: 1.25rem;
      border-radius: 12px;
      border: 1px solid #e5e7eb;
      transition: all 0.3s ease;
    }

    .detail-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      border-color: #16a34a;
    }

    .detail-label {
      font-weight: 600;
      color: #374151;
      font-size: 0.9rem;
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .detail-label i {
      color: #16a34a;
    }

    .detail-value {
      font-size: 1.1rem;
      color: #1f2937;
      font-weight: 500;
    }

    .btn-back {
      background: transparent;
      border: 2px solid #6b7280;
      color: #6b7280;
      padding: 1rem 2rem;
      border-radius: 12px;
      font-weight: 600;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
    }

    .btn-back:hover {
      background: #6b7280;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(107, 114, 128, 0.3);
    }

    .btn-add-cart {
      background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
      color: white;
      border: none;
      padding: 1rem 2.5rem;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      box-shadow: 0 6px 20px rgba(22, 163, 74, 0.3);
    }

    .btn-add-cart:hover {
      background: linear-gradient(135deg, #15803d 0%, #166534 100%);
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(22, 163, 74, 0.4);
    }

  
    .related-products-section {
      margin-top: 5rem;
      padding: 3rem 0;
      background: white;
      border-radius: 25px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    }

    .section-title {
      font-size: 2.2rem;
      font-weight: 800;
      color: #1a472a;
      text-align: center;
      margin-bottom: 3rem;
      position: relative;
      padding-bottom: 1rem;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: linear-gradient(90deg, #16a34a, #22c55e);
      border-radius: 2px;
    }

    .products-grid-shein {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 2rem;
      padding: 1rem;
    }

    .product-card-shein {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid #f0f0f0;
      position: relative;
    }

    .product-card-shein:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .product-image-shein {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .product-card-shein:hover .product-image-shein {
      transform: scale(1.08);
    }

    .quick-add-btn {
      position: absolute;
      bottom: 60px;
      left: 50%;
      transform: translateX(-50%) translateY(20px);
      background: white;
      color: #16a34a;
      border: 2px solid #16a34a;
      padding: 0.75rem 1.5rem;
      border-radius: 25px;
      font-weight: 600;
      opacity: 0;
      transition: all 0.3s ease;
      cursor: pointer;
      white-space: nowrap;
    }

    .product-card-shein:hover .quick-add-btn {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    .product-info-shein {
      padding: 1.25rem;
    }

    .product-name-shein {
      font-size: 1rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 0.5rem;
      line-height: 1.4;
      height: 2.8rem;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .product-price-shein {
      font-size: 1.3rem;
      font-weight: 700;
      color: #16a34a;
      margin: 0.5rem 0;
    }

    .product-rating {
      display: flex;
      align-items: center;
      gap: 0.25rem;
      margin: 0.5rem 0;
    }

    .star {
      color: #ffb400;
      font-size: 0.9rem;
    }

    .view-all-btn {
      display: block;
      width: fit-content;
      margin: 3rem auto 0;
      background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
      color: white;
      padding: 1rem 3rem;
      border-radius: 12px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 6px 20px rgba(22, 163, 74, 0.3);
    }

    .view-all-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(22, 163, 74, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .product-title {
        font-size: 2rem;
      }
      
      .price-tag {
        font-size: 2.2rem;
      }
      
      .main-image {
        height: 350px;
      }
      
      .products-grid-shein {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
      }
      
      .product-image-shein {
        height: 180px;
      }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
      .products-grid-shein {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    @media (min-width: 1025px) {
      .products-grid-shein {
        grid-template-columns: repeat(4, 1fr);
      }
    }
  </style>

  <main class="product-detail-container">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      
      <!-- Detalle del producto -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        
        <!-- Imagen del producto -->
        <div class="product-image-gallery">
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
            alt="{{ $product->name }}"
            class="main-image"
            onerror="this.src='{{ $fallback }}'"
          >
        </div>
        
        <!-- Información del producto -->
        <div class="product-info-card">
          <h1 class="product-title">{{ $product->name }}</h1>
          
          <!-- Descripción -->
          <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Descripción</h3>
            <p class="text-gray-700 leading-relaxed">
              {{ $product->description }}
            </p>
          </div>
          
          <!-- Descripción detallada -->
          @if($product->contentProductDescription)
            <div class="mb-6 border-l-4 border-green-500 pl-4 py-2 bg-green-50 rounded-r-lg">
              <h3 class="text-lg font-semibold text-gray-800 mb-2">Detalles del producto</h3>
              <div class="text-gray-700 leading-relaxed">
                {!! nl2br(e($product->contentProductDescription)) !!}
              </div>
            </div>
          @endif
          
          <!-- Precio -->
          <div class="price-tag">
            ${{ number_format($product->price, 0) }}
          </div>
          
          <!-- Detalles del producto -->
          <div class="product-details-grid">
            <div class="detail-item">
              <div class="detail-label">
                <i class="fas fa-box"></i> Stock disponible
              </div>
              <div class="detail-value">{{ $product->stock }}</div>
            </div>
            
            <div class="detail-item">
              <div class="detail-label">
                <i class="fas fa-palette"></i> Color
              </div>
              <div class="detail-value">{{ $product->color ?? 'Variado' }}</div>
            </div>
            
            <div class="detail-item">
              <div class="detail-label">
                <i class="fas fa-tag"></i> Categoría
              </div>
              <div class="detail-value">{{ $product->category ?? 'General' }}</div>
            </div>
            
            <div class="detail-item">
              <div class="detail-label">
                <i class="fas fa-check-circle"></i> Estado
              </div>
              <div class="detail-value">{{ $product->status ?? 'Disponible' }}</div>
            </div>
          </div>
          
          <!-- Botones de acción -->
          <div class="flex flex-col sm:flex-row gap-4 pt-6">
            <a href="{{ route('products.index') }}" class="btn-back">
              <i class="fas fa-arrow-left"></i> Volver al catálogo
            </a>
            
            <form method="POST" action="{{ route('addCarrito') }}" class="flex-1">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="quantity" value="1">
              
              <button type="submit" class="btn-add-cart w-full">
                <i class="fas fa-cart-plus"></i> Agregar al carrito
              </button>
            </form>
          </div>
        </div>
      </div>
      
     
      <div class="related-products-section">
        <h2 class="section-title">Productos que podrían interesarte</h2>
        
        <div class="products-grid-shein">
          @php
            // Obtener productos relacionados (misma categoría o aleatorios)
            $relatedProducts = \App\Models\Product::where('id', '!=', $product->id)
              ->inRandomOrder()
              ->limit(8)
              ->get();
          @endphp
          
          @foreach($relatedProducts as $related)
            <div class="product-card-shein">
              <img 
                src="{{ $related->photo ? (Str::startsWith($related->photo, ['http', 'https']) ? $related->photo : Storage::url($related->photo)) : asset('fondos_imagenes_video/vietnam.jpg') }}"
                alt="{{ $related->name }}"
                class="product-image-shein"
                onerror="this.src='{{ asset('fondos_imagenes_video/vietnam.jpg') }}'"
              >
              
              <button class="quick-add-btn" onclick="addToCart({{ $related->id }})">
                <i class="fas fa-cart-plus"></i> Agregar
              </button>
              
              <div class="product-info-shein">
                <h3 class="product-name-shein">{{ $related->name }}</h3>
                
                <div class="product-rating">
                  @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star star"></i>
                  @endfor
                  <span class="text-gray-600 text-sm ml-2">({{ rand(10, 50) }})</span>
                </div>
                
                <div class="product-price-shein">${{ number_format($related->price, 0) }}</div>
                
                <a href="{{ route('products.show', $related->id) }}" class="text-green-600 hover:text-green-700 text-sm font-medium inline-block mt-2">
                  Ver detalles →
                </a>
              </div>
            </div>
          @endforeach
        </div>
        
        <a href="{{ route('products.index') }}" class="view-all-btn">
          <i class="fas fa-store"></i> Ver todos los productos
        </a>
      </div>
    </div>
  </main>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script>
    function addToCart(productId) {
      fetch('/addCarrito', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
          product_id: productId,
          quantity: 1
        })
      })
      .then(response => response.json())
      .then(data => {
        // Mostrar notificación
        alert('¡Producto agregado al carrito!');
        // Actualizar contador del carrito si existe
        if (typeof cantidad_productos_carrito === 'function') {
          cantidad_productos_carrito();
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Error al agregar al carrito');
      });
    }
  </script>
  
  <x-footer />
</x-guest-layout>