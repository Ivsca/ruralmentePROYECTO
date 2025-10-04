<div>
    <button wire:click="set('categoryPlan', true)"
        class="group hover:bg-sky-600 relative bg-sky-700 rounded text-neutral-50 duration-500 font-bold flex justify-start gap-2 items-center p-2 pr-6">
        <i class="fa-solid fa-plus"></i>
        <span class="border-l-2 px-1">Añadir categoria</span>
        <div
            class="group-hover:opacity-100 opacity-0 top-16 absolute z-10 inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-500 bg-sky-600 rounded-lg shadow-sm before:w-3 before:h-3 before:rotate-45 before:-top-1 before:left-20 before:bg-sky-600 before:absolute">
            Añade una categoria para los agricultores!
        </div>
    </button>


    <x-dialog-modal wire:model='categoryPlan'>
        <x-slot name="title">
            <div class="flex justify-end gap-4">
                <p class="w-full bg-blue-700 p-2 rounded-md shadow-lg shadow-gray-400 text-white">Añade la categoria de
                    los agricultores</p>
                <button wire:click="set('categoryPlan', false)" class="bg-blue-500 w-12 text-center rounded-md"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>

        </x-slot>
        <x-slot name="content">
            <div>
                <x-label for="name">Nombre de la categoria</x-label>
                <x-input class="w-full" wire:model='name' />
                <x-input-error for="name" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click='createCategory' class="bg-blue-700 px-3 py-1 rounded-md text-white">Añadir</button>
        </x-slot>
    </x-dialog-modal>
</div>
