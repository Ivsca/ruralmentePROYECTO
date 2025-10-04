{{-- ESTOS CAMPOS DESPÚES SERÁN REEMPLAZADOS DEPENDIENDO DE LA INFORMACIÓN EN EL SEEDER --}}
<div>
    <button wire:click="set('open', true)"
        class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Ver
        más...</button>

    <x-dialog-modal wire:model="open" maxWidth="5xl">
        <x-slot name="title">
            <div class="flex justify-end w-full">
                <button wire:click="set('open', false)" class=""><i class="fa-solid fa-xmark"></i></button>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 my-3">
                <p class="w-9/12 p-4 text-3xl font-bold text-white rounded-r-full shadow-md h-min shadow-gray-600"
                    style="background-color: {{ $product->color }}">
                    Café tostado</p>
                <p class="w-full text-5xl font-bold text-center text-black">{{ $product->name }}</p>
            </div>
            <div class="grid grid-cols-2">
                <div class="flex justify-center">
                    <img class="object-fill h-96" src="{{ Storage::url($product->photo) }}" alt="">
                </div>
                <div class="flex flex-col justify-between w-full ml-2 text-center text-black">
                    <div>
                        <h1 class="text-lg font-extrabold tracking-[0.5rem]">{{ $product->title }}</h1>
                        <hr class="h-1 my-2 bg-black rounded-full">
                        <p class="text-lg text-justify">{{ $product->description }}</p>
                        <div class="flex items-center my-4">
                            @for ($i = 1; $i <= 5; $i++)
                                <button wire:click="setRating({{ $i }})" class="mr-1">
                                    <i
                                        class="fa-regular fa-star {{ $i <= $rating ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                </button>
                            @endfor
                            <span>| Opiniones públicas</span>
                        </div>
                    </div>

                    <div id="contentEval" class='overflow-hidden overflow-y-auto h-80'>
                        <p class="text-gray-400">{{$product->contentProductDescription}}</p>
                        {{-- emaema--}}
                    </div>
                    <div>
                        <div class="flex justify-between w-8/12">
                            <button
                                class="px-4 py-2 rounded shadow-md hover:bg-gray-200 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">125g</button>
                            <button
                                class="px-4 py-2 rounded shadow-md hover:bg-gray-200 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">250g</button>
                            <button
                                class="px-4 py-2 rounded shadow-md hover:bg-gray-200 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">500g</button>
                            <button
                                class="px-4 py-2 rounded shadow-md hover:bg-gray-200 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">5
                                libras</button>
                        </div>
                        <div class="my-2 text-2xl text-left">
                            <label for="quantity" class="flex items-center">
                                Cantidad: <input type="number" name="" id="quantity" class="w-24 h-6 mx-2 text-center bg-gray-100 rounded-sm border-inherit focus:ring-0 focus:border-gray-200 focus:bg-inherit">
                            </label>
                            <p>Precio: <span class="text-green-700">$ {{ number_format($product->price, 0) }}</span></p>
                        </div>
                        @include('portailsMensaje.msg')
                        <div class="grid grid-cols-2 text-lg">
                            <form action="{{route('addCarrito')}}" method="post">
                                @csrf
                                <input name='id' type="hidden" value="{{$product->id}}">
                                <button name='addProduct'                                  class="px-3 py-1 m-2 duration-300 bg-gray-200 rounded shadow-md hover:scale-105 hover:bg-gray-200 bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">Agregar
                                    al carrito<i class="mx-2 fa-solid fa-cart-shopping"></i></button>
                            </form>

                            @auth
                                <a href="{{route('pago', $product->id)}}"
                                    class="px-3 py-1 m-2 duration-300 bg-gray-200 rounded shadow-md hover:scale-105 hover:bg-gray-200 bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">Comprar</a>
                            @else
                                @livewire('modal.modal-login', ['seeButton' => $seeButton])
                                @if ($register)
                                    @livewire('modal.modal-register')
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-dialog-modal>
</div>
