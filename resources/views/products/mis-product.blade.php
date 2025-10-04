<x-guest-layout>
    @livewire('navigation-menu')
    <div class="flex items-center justify-center w-full mt-10 overflow-x-auto">
        <div class="w-11/12 bg-gray-300 rounded-md">
            <div class="px-4 py-3 mb-0 border-0 rounded-t">
                <div class="flex flex-wrap items-center">
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4">
                        <h3 class="text-base font-semibold text-blueGray-700">Mis productos</h3>
                    </div>
                    <div class="flex-1 flex-grow w-full max-w-full px-4 text-right">

                        <a href="{{ route('clear') }}"
                            class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear rounded outline-none bg-emerald-500 active:bg-emerald-700 focus:outline-none">Vaciar
                            carrito</a>
                    </div>
                </div>
            </div>
            @if (\Cart::count())
                <table class="items-center w-full bg-transparent border-collapse ">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                                ID
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                                imagen
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                                Nombre del producto
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                                Cantidad
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                                Precio
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                                Precio Total
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                                accion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                            <tr class="border border-l-0 border-r-0 border-gray-100 border-solid">
                                <th
                                    class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap text-blueGray-700 ">
                                    {{ $item->id }}
                                </th>
                                <th
                                    class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap text-blueGray-700 ">
                                    <img class="object-cover w-16 h-16 rounded-md shadow-lg"
                                        src="{{ Storage::url($item->options->photo) }}" alt="">
                                </th>
                                <td
                                    class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $item->name }}
                                </td>
                                <td
                                    class="flex items-center gap-2 p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <form action="{{ route('decrement') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->rowId }}">
                                        <button name="decrement" class="p-1 bg-blue-300"><i
                                                class="fa-solid fa-minus"></i></button>
                                    </form>
                                    <p class="text-lg">{{ $item->qty }}</p>
                                    <form action="{{ route('increment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->rowId }}">
                                        <button name="increment" class="p-1 bg-blue-300"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </form>
                                </td>
                                <td
                                    class="p-4 px-6 text-xs border-t-0 border-l-0 border-r-0 align-center whitespace-nowrap">
                                    $ {{ number_format($item->price, 0) }}
                                </td>
                                <td
                                    class="p-4 px-6 text-xs border-t-0 border-l-0 border-r-0 align-center whitespace-nowrap">
                                    $ {{ number_format($item->price * $item->qty, 0) }}
                                </td>
                                <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0">
                                    <form action="{{ route('removeItem') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->rowId }}">
                                        <button name="delete" class="p-1 m-1 bg-red-500 rounded-md">Eliminar</button>
                                    </form>
                                    {{-- <i class="mr-4 fas fa-arrow-up text-emerald-500"></i>
                      46,53% --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="flex flex-col items-end justify-center w-full p-3">
                    <div class="flex justify-between w-72">
                        <p class="text-xl font-bold underline underline-offset-1">Subtotal: </p>
                        <p>{{ Cart::subtotal() }}</p>
                    </div>
                    <div class="flex justify-between w-72">
                        <p class="text-xl font-bold underline underline-offset-1">IVA: </p>
                        <p>{{ Cart::tax() }}</p>
                    </div>
                    <div class="flex justify-between w-72">
                        <p class="text-xl font-bold underline underline-offset-1">total: </p>
                        <p>{{ Cart::total() }}</p>
                    </div>
                </div>
            @else
                <div class="my-2">
                    <p class="my-3 p-1 bg-teal-600">no hay productos en el carrito </p>
                    <a href="{{ route('dashboard') }}" class="px-2 py-1 mx-3 text-white bg-black rounded-md">Ver todos
                        los productos</a>
                </div>
            @endif
        </div>

    </div>
</x-guest-layout>
