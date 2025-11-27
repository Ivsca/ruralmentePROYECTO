<x-guest-layout>

  <div class="max-w-4xl mx-auto px-6 py-10">

    <div class="flex flex-col md:flex-row gap-8">

      <!-- Imagen del producto -->
      <div class="w-full md:w-1/2 bg-gray-200 rounded-xl overflow-hidden">
        <img src="{{ Storage::url($product->photo) }}"
             class="w-full h-80 object-cover"
             alt="{{ $product->name }}">
      </div>

      <!-- Info del producto -->
      <div class="flex-1 space-y-4">

        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>

        <p class="text-gray-600">{{ $product->description }}</p>

        <p class="text-2xl font-bold">$ {{ number_format($product->price, 0) }}</p>

        <p class="text-sm text-gray-500">Stock disponible: {{ $product->stock }}</p>

        <p class="text-sm text-gray-500">Color: {{ $product->color ?? 'N/A' }}</p>

        <p class="text-sm text-gray-500">
          Categoría: {{ $product->categoryProduct ?? 'Sin categoría' }}
        </p>

        <!-- Botones -->
        <div class="flex gap-4 mt-6">

          <a href="{{ route('products.index') }}"
             class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
            Volver
          </a>

          <form method="POST" action="{{ route('addCarrito') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">

            <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
              Agregar al carrito
            </button>
          </form>

        </div>

      </div>
    </div>
  </div>

</x-guest-layout>
