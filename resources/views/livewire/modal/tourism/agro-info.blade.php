<div>
    <button wire:click="set('openInfoAgro', true)" class="p-1 text-white bg-gray-600 rounded-md shadow-lg">Aquí más información...</button>

    <x-dialog-modal wire:model="openInfoAgro" maxWidth="5xl">
        <x-slot name="title">
            <div class="flex justify-end w-full">
                <button wire:click="set('openInfoAgro', false)" class=""><i class="fa-solid fa-xmark"></i></button>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 my-3">
                <p class="w-9/12 p-4 text-3xl font-bold text-white rounded-r-full shadow-md h-min shadow-gray-600"
                    style="background-color: {{ $workshop->color }}">
                    Café tostado</p>
                <p class="w-full text-6xl font-bold text-center text-black">{{$workshop->name}}</p>
            </div>
            <div class="grid grid-cols-2">
                <div class="w-full">
                    <img class="object-cover" src="{{ Storage::url($workshop->photo) }}" alt="">
                </div>
                <div class="flex flex-col justify-between w-full ml-2 text-center text-black">
                    <div>
                        <h1 class="text-xl font-extrabold tracking-[1rem]"> {{$workshop->title}} </h1>
                        <hr class="h-1 my-2 bg-black rounded-full">
                        <p class="text-lg text-justify">{{$workshop->description}}</p>
                        {{-- <div class="flex items-center my-4">
                            @for ($i = 1; $i <= 5; $i++)
                                <button wire:click="setRating({{ $i }})" class="mr-1">
                                    <i
                                        class="fa-regular fa-star {{ $i <= $rating ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                </button>
                            @endfor
                            <span>| Opiniones públicas</span>
                        </div> --}}
                        {{-- <p class="text-left">Desde: <span class="text-green-700">$25.000</span></p> --}}
                    </div>

                    <div>
                        <p class="text-gray-400">*carrito con las cosas que comprará o imagenes de producto*</p>
                        {{-- emaema --}}
                    </div>
                    <div>
                        <div class="flex justify-between w-8/12">
                            <button
                                class="px-4 py-2 rounded shadow-md hover:bg-gray-200 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">7 personas</button>
                            <button
                                class="px-4 py-2 rounded shadow-md hover:bg-gray-200 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">7-10 personas</button>
                            <button
                                class="px-4 py-2 rounded shadow-md hover:bg-gray-200 hover:bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">10-12 personas</button>
                        </div>
                        <div class="my-2 text-2xl text-left">

                            <p>Precio: <span class="text-green-700">$ {{ number_format($workshop->price, 0) }}</span></p>
                        </div>
                        <div class="grid grid-cols-2 text-lg">
                            

                            @auth
                                <a href="{{route('ViewEventPay', $workshop->id)}}"
                                    class="px-3 py-1 m-2 duration-300 bg-gray-200 rounded shadow-md hover:scale-105 hover:bg-gray-200 bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">Asistir al evento</a>
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
