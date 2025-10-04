<div>
    {{-- @if (request()->routeIs('Turism'))
        <button wire:click="set('openWorkInfo', true)">más informacion</button>
    @elseif (request()->routeIs('Turism') == false) --}}
        <div class="flex justify-end"><button wire:click="set('openWorkInfo', true)" class="p-1 text-white bg-gray-600 rounded-md shadow-lg">Aquí más información...</button></div>
    {{-- @endif --}}

    <x-dialog-modal wire:model="openWorkInfo" maxWidth="5xl">
        <x-slot name="title">
            <div class="flex justify-end w-full">
                <button wire:click="set('openWorkInfo', false)" class=""><i class="fa-solid fa-xmark"></i></button>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 my-3">
                <p class="w-9/12 p-4 text-3xl font-bold text-white rounded-r-full shadow-md h-min shadow-gray-600"
                    style="background-color: {{ $workshop->color }}">
                    Talleres & Cursos</p>
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
                    </div>

                    <div>
                        <p class="text-gray-400">*carrito con las cosas que comprará o imagenes de producto*</p>
                        {{-- emaema --}}
                    </div>
                    <div>
                        <p class="text-lg text-start"><span class="font-bold capitalize">limite de participantes: </span>7 - {{$workshop->participant}}</p>
                        <div class="my-2 text-2xl text-left">

                            <p>Precio: <span class="text-green-700">$ {{ number_format($workshop->price, 0) }}</span></p>
                        </div>
                        <div class="flex justify-end text-lg">

                            @auth
                                <a href="{{route('EventCalendar', $workshop->id)}}"
                                    class="w-56 px-3 py-1 m-2 duration-300 bg-gray-300 rounded shadow-md hover:scale-105 hover:bg-gray-200 bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">Asistir al evento</a>
                                {{-- <form action="{{route('ViewEventPay', $workshop->id)}}" method="POST">
                                    <input type="hidden" value="{{$workshop->id}}">
                                    <button class="w-56 px-3 py-1 m-2 duration-300 bg-gray-300 rounded shadow-md hover:scale-105 hover:bg-gray-200 bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">Asistir al evento</button>
                                </form> --}}
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
