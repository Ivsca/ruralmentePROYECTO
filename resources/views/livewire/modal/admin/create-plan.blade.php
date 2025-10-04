<div class="flex">
    <button wire:click="set('openCreatePlan', true)" class="bg-sky-700 px-2 py-1 rounded-md text-white"><i
            class="mr-1 fa-solid fa-plus"></i> Añadir planes</button>

    <x-dialog-modal wire:model='openCreatePlan'>
        <x-slot name="title">
            <div class="flex gap-3">
                <p class="bg-sky-700 text-white rounded-md w-full text-center">Nuevo plan</p>
                <button wire:click="set('openCreatePlan', false)"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2 gap-3">
                <div class="my-2">
                    <x-label for="name">Nombre del plan</x-label>
                    <x-input class="w-full" type="text" wire:model='name' />
                    <x-input-error for="name" />
                </div>
                <div class="my-2">
                    <x-label for="producers">¿Cuantos agricultores se permiten?</x-label>
                    <x-input class="w-full" type="number" wire:model='producers' />
                    <x-input-error for="producers" />
                </div>
            </div>

            <div class="my-2">
                <x-label for="platform" class="text-black text-lg">¿Permite tener plataforma?</x-label>
                <select class="w-full rounded-md border-gray-300" wire:model="platform">
                    <option selected hidden>Seleccione una opcion</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <x-input-error for="platform" />
            </div>
            <div class="my-2">
                <x-label for="">¿En este  plan se permiten los dias de campo?</x-label>
                <div class="flex justify-around w-full" x-data="{ selectedCheckbox: null }">
                    <div class="flex w-auto px-3 py-1 rounded-lg cursor-pointer hover:bg-gray-300 active:bg-gray-300"
                        :class="{ 'bg-gray-400': selectedCheckbox === 'Permitido' }">
                        <input class="hidden" type="checkbox" id="Permitido" wire:model="fieldDay"
                            wire:change="$set('fieldDay', 'Permitido' )" :checked="selectedCheckbox === 'Permitido'">
                        <label for="Permitido" class="w-full h-full cursor-pointer text-black">
                            <p class="text-lg">Permitido</p>
                        </label>
                    </div>
                    <div class="flex w-auto px-3 py-1 rounded-lg cursor-pointer hover:bg-gray-300 active:bg-gray-300 group"
                        :class="{ 'bg-gray-400': selectedCheckbox === 'No permitido' }">
                        <input class="hidden" type="checkbox" id="No permitido" wire:model="fieldDay"
                            wire:change="$set('fieldDay', 'No permitido' )" :checked="selectedCheckbox === 'No permitido'">
                        <label for="No permitido" class="w-full h-full cursor-pointer text-black">
                            <p class="text-lg">No permitido</p>
                        </label>
                    </div>
                </div>
                <x-input-error for="fieldDay"/>
                @if ($fieldDay === 'Permitido')
                    <div class="my-2">
                        <label class="w-full h-full cursor-pointer text-black" for="choiceType">¿Cuales son los dias de campo?</label>
                        <textarea wire:model='choiceType' class="rounded-md border-gray-300 w-full" cols="30" rows="5"></textarea>
                        <x-input-error for="choiceType" />
                    </div>
                @elseif ($fieldDay === 'No permitido')
                    <p></p>
                @endif
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div class="my-2">
                    <x-label for="quantitySession">¿Cuantas sesiones psicosociales son?</x-label>
                    <x-input type="number" wire:model='quantitySession' class="w-full" />
                    <x-input-error for="quantitySession" />
                </div>
                <div class="my-2">
                    <x-label for="telepsychologies">Ayuda Telepsicosocial?</x-label>
                    <select class="w-full rounded-md border-gray-300" wire:model="telepsychologies">
                        <option selected hidden>Seleccione una opcion</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <x-input-error for="telepsychologies" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click='createPlan' class="bg-sky-700 text-white py-1 px-2 rounded-md">Crear plan</button>
        </x-slot>

    </x-dialog-modal>
</div>
