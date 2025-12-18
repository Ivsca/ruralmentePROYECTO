<x-guest-layout>
  <div class="max-w-6xl mx-auto px-6 py-12">
    <div class="border border-gray-200 rounded-xl bg-white p-8">
      <div class="flex flex-col md:flex-row gap-10">

        <!-- Imagen con fallback -->
        <div class="md:w-1/2 flex items-start justify-center bg-gray-100 rounded-lg p-4">
          @php
            $fallback = asset('fondos_imagenes_video/vietnam.jpg');
            $imageUrl = null;
            if ($product->photo) {
                $imageUrl = \Illuminate\Support\Str::startsWith($product->photo, ['http', 'https'])
                    ? $product->photo
                    : \Illuminate\Support\Facades\Storage::url($product->photo);
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

          <p class="text-gray-700 text-lg leading-relaxed">
            {{ $product->description }}
          </p>

          @if(!empty($product->contentProductDescription))
            <div class="border-t pt-4">
              <h2 class="text-xl font-semibold text-gray-800">Descripción detallada</h2>
              <p class="text-gray-700 leading-relaxed mt-2">
                {!! nl2br(e($product->contentProductDescription)) !!}
              </p>
            </div>
          @endif

          <!-- Precio y stock -->
          <div class="grid grid-cols-2 gap-4 text-gray-700 text-sm pt-4">
            <div>
              <span class="font-semibold text-gray-900">Precio:</span><br>
              <span class="text-2xl font-bold text-green-600">
                $ {{ number_format($product->price ?? 0, 2) }}
              </span>
            </div>

            <div>
              <span class="font-semibold text-gray-900">Stock disponible:</span><br>
              {{ $product->stock ?? 0 }}
            </div>
          </div>

          <!-- FORM -->
          <form id="add-to-cart-form" method="POST" action="{{ route('carrito.add', $product->id) }}">
            @csrf

            <div class="grid grid-cols-2 gap-4 text-gray-700 text-sm pt-4">

              @if(strtolower(trim($product->category ?? '')) !== 'cafe')
                <div>
                  <span class="font-semibold text-gray-900">Color:</span><br>
                  <select name="color" id="color-select" class="mt-1 w-full border rounded px-2 py-1">
                    @forelse($product->colors as $color)
                      <option value="{{ $color }}">{{ $color }}</option>
                    @empty
                      <option value="">Sin opciones</option>
                    @endforelse
                  </select>
                </div>
              @endif

              @if(strtolower($product->category ?? '') === 'camisas')
                <div>
                  <span class="font-semibold text-gray-900">Talla:</span><br>
                  <select name="talla" id="talla-select" class="mt-1 w-full border rounded px-2 py-1" required>
                    @php $sizes = ['S','M','L','XL']; @endphp
                    @foreach($sizes as $s)
                      <option value="{{ $s }}">{{ $s }}</option>
                    @endforeach
                  </select>
                </div>
              @endif

              <div>
                <span class="font-semibold text-gray-900">Cantidad:</span><br>
                <input
                  type="number"
                  name="quantity"
                  value="1"
                  min="1"
                  max="{{ $product->stock ?? 999 }}"
                  class="mt-1 w-full border rounded px-2 py-1"
                >
              </div>
            </div>

            <div class="flex gap-4 pt-8">
              <a href="{{ route('products.index') }}"
                 class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition">
                Volver
              </a>

              <button
                type="submit"
                @if(($product->stock ?? 0) <= 0) disabled @endif
                class="px-6 py-2.5 bg-green-700 text-white rounded-lg hover:bg-green-800 transition font-semibold disabled:opacity-50">
                Agregar al carrito
              </button>
            </div>
          </form>

          <!-- AJAX -->
          <script>
            (function () {
              const form = document.getElementById("add-to-cart-form");
              if (!form) return;

              form.addEventListener("submit", async function (e) {
                e.preventDefault();

                const url = form.action;
                const data = new FormData(form);

                try {
                  const response = await fetch(url, {
                    method: "POST",
                    headers: {
                      "X-Requested-With": "XMLHttpRequest",
                      "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: data
                  });

                  const json = await response.json();

                  if (!response.ok) {
                    alert(json?.message || "Error al agregar al carrito.");
                    return;
                  }

                  alert("Agregado al carrito ✓");
                } catch (err) {
                  alert("Error de red.");
                }
              });
            })();
          </script>

        </div>
      </div>

      <!-- Productos relacionados -->
      <div class="related-products-section">
        <h2 class="section-title">Productos que podrían interesarte</h2>

        <div class="products-grid-shein">
          @php
            $relatedProducts = \App\Models\Product::where('id', '!=', $product->id)
              ->inRandomOrder()
              ->limit(8)
              ->get();
          @endphp

          @foreach($relatedProducts as $related)
            <div class="product-card-shein">
              <img
                src="{{ $related->photo
                  ? (\Illuminate\Support\Str::startsWith($related->photo, ['http', 'https'])
                      ? $related->photo
                      : \Illuminate\Support\Facades\Storage::url($related->photo))
                  : asset('fondos_imagenes_video/vietnam.jpg') }}"
                alt="{{ $related->name }}"
                class="product-image-shein"
                onerror="this.src='{{ asset('fondos_imagenes_video/vietnam.jpg') }}'"
              >

              <div class="product-info-shein">
                <h3 class="product-name-shein">{{ $related->name }}</h3>
                <div class="product-price-shein">${{ number_format($related->price, 0) }}</div>
                <a href="{{ route('products.show', $related->id) }}" class="text-green-600 text-sm">
                  Ver detalles →
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</x-guest-layout>
