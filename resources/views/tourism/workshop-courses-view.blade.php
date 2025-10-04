<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register=false/>

    <div class="flex flex-col w-full px-16 mt-32">
        <div class="flex items-center w-full">
                <p class="border-2 border-[#073b17] rounded-lg text-2xl font-bold w-[40vh] text-center">Talleres & cursos</p>
                <hr class="w-full h-1 bg-gradient-to-r from-[#073b17]">
        </div>

        <div class="mt-4 ml-3 text-xl font-semibold text-gray-500">
            Demostrativo
        </div>
        <div class="my-5">
            @livewire('tourism.CardWorkshopCoursesDemostratives')
        </div>
        <div class="ml-3 text-xl font-semibold text-gray-500">
            Practico
        </div>
        <div class="grid grid-cols-2 gap-2 my-5">
            @livewire('tourism.CardWorkPractic')
        </div>

    </div>

    <x-footer/>
</x-guest-layout>
