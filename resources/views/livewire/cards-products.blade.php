<section class="grid grid-cols-4 gap-3 p-3">
    <!-- carta de los Productos -->
    @forelse ($products as $product)
    <div class="relative flex flex-col text-gray-700 bg-gray-300 shadow-md w-80 rounded-xl bg-clip-border mt-9">
        <div class="relative mx-4 overflow-hidden text-white shadow-lg -mt-7 h-52 rounded-xl bg-clip-border shadow-gray-500 bg-gradient-to-r">
            <img class="object-cover w-full h-52 rounded-t-md" src="{{Storage::url($product->photo)}}" alt="">
        </div>
        <div class="p-6">
          <h5 class="block mb-2 font-sans text-lg antialiased font-extrabold leading-snug tracking-normal text-black uppercase text-blue-gray-900 text-end">
            {{ $product->name}}
          </h5>
          <hr class="border-gray-400">
          <h2 class="text-lg font-bold">
            {{$product->title}}
          </h2>
          <p id="contentEval" class="block h-24 font-sans text-base antialiased font-light leading-relaxed text-inherit">
            {{ $product->description}} 
          </p>

        </div>
        <div class="flex items-center justify-between m-4">
            <p class="my-2">
              <span class="font-bold">Precio:</span> $ {{number_format($product->price, 0)}}
            </p>
            @livewire('modal.description-products',['productId' => $product->id])
        </div>
      </div>
        @empty
        <p>No hay productos disponibles</p>
    @endforelse
</section>
