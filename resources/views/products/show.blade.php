<x-guest-layout>

  <div class="max-w-6xl mx-auto px-6 py-12">

    <div class="border border-gray-200 rounded-xl bg-white p-8">

      <div class="flex flex-col md:flex-row gap-10">

        <!-- Imagen con fallback -->
        <div class="md:w-1/2 flex items-start justify-center bg-gray-100 rounded-lg p-4">

          @php
              // Local fallback image
              $fallback = asset('fondos_imagenes_video/vietnam.jpg');

              // Main image logic
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
              class="w-full h-[420px] object-cover rounded-lg"
              onerror="this.src='{{ $fallback }}'"
          >


        </div>

        <!-- Información del producto -->
        <div class="flex-1 space-y-6">

          <h1 class="text-4xl font-bold text-gray-900 leading-tight">
            {{ $product->name }}
          </h1>

          <!-- Descripción principal -->
          <p class="text-gray-700 text-lg leading-relaxed">
            {{ $product->description }}
          </p>

          <!-- Descripción larga (opcional) -->
          @if($product->contentProductDescription)
            <div class="border-t pt-4">
              <h2 class="text-xl font-semibold text-gray-800">Descripción detallada</h2>
              <p class="text-gray-700 leading-relaxed mt-2">
                {!! nl2br(e($product->contentProductDescription)) !!}
              </p>
            </div>
          @endif

          <!-- Datos del producto -->
          <div class="grid grid-cols-2 gap-4 text-gray-700 text-sm pt-4">

            <div>
              <span class="font-semibold text-gray-900">Precio:</span><br>
              <span class="text-2xl font-bold text-green-600">
                $ {{ number_format($product->price, 0) }}
              </span>
            </div>

            <div>
              <span class="font-semibold text-gray-900">Stock disponible:</span><br>
              {{ $product->stock }}
            </div>

            <div>
              <span class="font-semibold text-gray-900">Color:</span><br>
              {{ $product->color ?? 'N/A' }}
            </div>

            <div>
              <span class="font-semibold text-gray-900">Categoría:</span><br>
              {{ $product->category ?? 'Sin categoría' }}
            </div>

            <div>
              <span class="font-semibold text-gray-900">Estado:</span><br>
              {{ $product->status ?? 'N/A' }}
            </div>

          </div>

          <!-- Botones -->
          <div class="flex gap-4 pt-8">

            <a href="{{ route('products.index') }}"
               class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition">
              Volver
            </a>

            <form method="POST" action="{{ route('addCarrito') }}">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="quantity" value="1">

              <button
                class="px-6 py-2.5 bg-green-700 text-white rounded-lg hover:bg-green-800 transition font-semibold">
                Agregar al carrito
              </button>
            </form>

          </div>

        </div>
      </div>
    </div>

  </div>

</x-guest-layout>
