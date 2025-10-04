<x-app-layout>

    <div class="flex justify-start m-6">
        <div class="w-2/3 flex justify-around items-center bg-teal-800 rounded-md shadow-md shadow-teal-700 ring-offset-2 text-white p-1">
            <p class="">Busqueda del producto </p>
            <input class="w-80 px-2 py-1 text-black border rounded-lg" placeholder="Buscar" type="text" >
        </div>
    </div>
    
    <div class="">

        @livewire('cards-products')
    </div>

</x-app-layout>
