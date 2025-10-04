<div>
    <a wire:click="set('openContact', true)">contactanos</a>

    <x-dialog-modal wire:model='openContact'>
        <x-slot name="title">
            <div class="flex justify-end"><button wire:click="set('openContact', false)"><i class="fa-solid fa-xmark"></i></button></div>
        </x-slot>

        <x-slot name="content">
            <div class="w-full  p-3">
            <div class="flex justify-center">
                <h1 class="text-2xl font-extrabold">Contactanos</h1>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <x-label for="name">Nombre completo</x-label>
                    <x-input  wire:model='name' type="text"  class="w-full" />
                    <x-input-error for="name"  />
                </div>
                <div>
                    <x-label for="email">CorreoElectronico</x-label>
                    <x-input wire:model='email'  type="email"  class="w-full" />
                    <x-input-error for="email"  />
                </div>
            </div>
            <div>
                    <x-label for="coment">Comentario</x-label>
                    <textarea wire:model='coment' cols="1" rows="3" class="w-full rounded-md border-gray-300 "></textarea>
                    <x-input-error for="coment"  />
                </div>
        </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click=''>enviar</x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
