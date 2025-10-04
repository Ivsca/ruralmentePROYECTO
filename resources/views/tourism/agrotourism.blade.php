<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register=false/>
    
    <div class="flex flex-col w-full px-16 mt-24">
        <div class="flex items-center w-full">
                <h1 class="px-4 py-2 border-2 border-[#073b17] rounded-lg ml-1 text-2xl font-bold">Agroturismo</h1>
                <hr class="w-full h-1 bg-gradient-to-r from-[#073b17]">
        </div>
        <div class="flex justify-center">
            @livewire('tourism.CardAgrotourism')
        </div>
    </div>
    
    <x-footer/>

</x-guest-layout>
