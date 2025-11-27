<x-guest-layout>

  <div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold mb-6">Productos</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

      @foreach($products as $product)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col hover:shadow-2xl transition">

          <div class="h-44 w-full bg-gray-200">
            <img src="{{ Storage::url($product->photo) }}" 
                 class="w-full h-full object-cover" 
                 alt="{{ $product->name }}">
          </div>

          <div class="p-4 flex flex-col flex-1">

            <h2 class="text-lg font-semibold">{{ $product->name }}</h2>

            <p class="text-sm text-gray-500 my-2 flex-1">
              {{ Str::limit($product->description, 80) }}
            </p>

            <div class="mt-3 flex items-center justify-between">
              <div>
                <p class="text-xl font-bold">$ {{ number_format($product->price, 0) }}</p>
                <p class="text-xs text-gray-400">Stock: {{ $product->stock }}</p>
              </div>

              <div class="flex flex-col gap-2">

                <a href="{{ route('products.show', $product->id) }}"
                   class="px-4 py-2 text-sm rounded-lg border hover:bg-gray-100 transition">
                  Ver más
                </a>

                <form method="POST" action="{{ route('addCarrito') }}">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <input type="hidden" name="quantity" value="1">

                  <button class="px-4 py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Agregar al carrito
                  </button>
                </form>

              </div>
            </div>

          </div>
        </div>
      @endforeach

    </div>
  </div>

</x-guest-layout>
