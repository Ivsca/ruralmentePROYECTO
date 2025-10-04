<div>
    <button class="bg-cyan-500 px-4 py-2 rounded-md text-white shadow-lg shadow-gray-400"
        wire:click="set('openTaller', true)"><i class="fa-solid fa-plus mr-1"></i> Nuevo evento</button>

    <x-dialog-modal wire:model="openTaller">
        <x-slot name="title">
            <div class="flex justify-end items-center gap-2">
                <div class="bg-cyan-600 w-full rounded-md flex justify-center ">
                    <h1 class="text-2xl text-gray-100 py-1">
                        AGREGA EL NUEVO EVENTO
                    </h1>
                </div>
                <button class="bg-cyan-500 px-4 py-2 rounded-md text-white shadow-lg shadow-gray-400"
                    wire:click="set('openTaller', false)"><i
                    class="fa-solid fa-xmark"></i></button>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-wrap gap-4 w-full justify-center">
                <div class="w-full" wire:loading wire:target='photo'>
                    <p class="p-2 bg-yellow-200 text-lg rounded-md shadow-md my-2 text-center">Esta cargando la imagen!
                        Espera un momento</p>
                </div>
                @if ($photo)
                    <img class="w-[50vh] border h-[40vh] object-cover" src="{{ $photo->temporaryUrl() }}"
                        alt="Image Preview">
                @else
                    <img class="w-[35vh] border h-[40vh]" src="{{ asset('logos/Merca_rural_negro.png') }}"
                        alt="imagen por defecto">
                @endif
            </div>

            <div class="flex justify-around my-8" x-data="{ selectedCheckbox: null, checkedCheckbox: '' }">
                <div class="flex w-auto rounded-lg cursor-pointer"
                    :class="{ 'bg-gray-300': selectedCheckbox === 'Agroturismo' }">
                    <input class="hidden" type="checkbox" id="Agroturismo" wire:model="eventType"
                        wire:change="$set('eventType', 'Agroturismo' ), $set('checkedCheckbox', $event.target.value)" :checked="selectedCheckbox === 'Agroturismo'">
                    <label for="Agroturismo" class="w-full h-full cursor-pointer bg-gray-200 hover:bg-gray-300  py-1 px-3 rounded-md shadow-lg shadow-gray-300">
                        <p class="text-lg text-black ">Agroturismo</p>
                    </label>
                </div>
                <div class="flex w-auto rounded-lg cursor-pointer"
                    :class="{ 'bg-gray-300': selectedCheckbox === 'Talleres' }">
                    <input class="hidden" type="checkbox" id="Talleres" wire:model="eventType"
                        wire:change="$set('eventType', 'Talleres' ), $set('checkedCheckbox', $event.target.value)" :checked="selectedCheckbox === 'Talleres'">
                    <label for="Talleres" class="w-full h-full cursor-pointer bg-gray-200 hover:bg-gray-300  py-1 px-3 rounded-md shadow-lg shadow-gray-300">
                        <p class="text-lg text-black">Talleres</p>
                    </label>
                </div>
            </div>
            <x-input-error for="eventType" />

            <div class="my-3">
                @if ($eventType === 'Talleres')
                    <x-label for="categoryEvent" class="text-xl font-semibold">tipo de taller y curso</x-label>
                    <select wire:model='categoryEvent' class="w-full rounded-md border-gray-300">
                        <option selected hidden value="">Seleccione una opción</option>
                        <option value="Demostrativo">Demostrativo</option>
                        <option value="Practico">Practico</option>
                    </select>
                    <x-input-error for="categoryEvent" />
                @elseif ($eventType === 'Agroturismo')
                    <p>numero nuevo</p>
                @endif
            </div>

            <div class="grid grid-cols-2 gap-2 my-2">
                <div>
                    <x-label class="text-xl font-semibold" for="">Nombre del evento</x-label>
                    <x-input class="w-full" wire:model='name' />
                    <x-input-error for="name" />
                </div>
                <div>
                    <x-label class="text-xl font-semibold" for="">Titulo del evento</x-label>
                    <x-input class="w-full" wire:model='title' />
                    <x-input-error for="title" />
                </div>
            </div>
            <div>
                <x-label class="text-xl font-semibold" for="description">Descripcion del evento</x-label>
                <textarea class="w-full rounded-md border-gray-300" wire:model='description' cols="3" rows="2"></textarea>
                <x-input-error for="description" />
            </div>
            <div>
                <x-label class="text-xl font-semibold" for="participant">limite de participantes</x-label>
                <x-input wire:model='participant' type="range" id="participant"  class="slider w-full"  min="7"
                    max="12"  />
                <output class="price-output" for="participant"></output>
                <x-input-error for="participant" />
            </div>
            <div class="grid grid-cols-2 gap-2 ">
                <div>
                    <x-label class="text-xl font-semibold" for="duration">Duracion</x-label>
                    <x-input type="number" class="w-full" wire:model='duration' />
                    <x-input-error for="duration" />
                </div>
                <div>
                    <x-label class="text-xl font-semibold" for="price">Precio</x-label>
                    <x-input class="w-full" wire:model='price' />
                    <x-input-error for="price" />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-2">
                <div class="w-full">
                    <x-label>Color</x-label>
                    <x-input type="color" wire:model='color' class="w-full" />
                    <x-input-error for="color" />
                </div>
                <div>
                    <x-label class="text-xl font-semibold" for="">Seleccione Foto del taller</x-label>
                    <x-input type="file" wire:model="photo" wire:change="resetPreview" class="flex w-full rounded-md border border-blue-300 border-input bg-white text-sm text-gray-400 file:border-0 file:bg-teal-600 file:text-white file:text-sm file:font-medium"
                        accept="image/png, image/jpeg, image/jpg" />
                    <x-input-error for="photo" />
                </div>
            </div>
            <div>
                <x-label class="text-xl font-semibold" for="location">Ubicacion</x-label>
                <x-input class="w-full" wire:model='location' />
                <x-input-error for="location" />
            </div>
        </x-slot>

        <x-slot name="footer">

            <button class="bg-red-500 font-extrabold p-2 rounded-md text-white"
                wire:click='createWorkshop'>Publicar</button>
        </x-slot>
    </x-dialog-modal>
</div>

<script>
    const price = document.querySelector("#participant");
    const output = document.querySelector(".price-output");

    output.textContent = price.value;

    price.addEventListener("input", function() {
        output.textContent = price.value;
    });

    document.addEventListener('livewire:load', function() {
        Livewire.on('imagePreview', function(imageData) {
            var previewImg = document.querySelector('img');
            if (previewImg) {
                previewImg.src = URL.createObjectURL(imageData);
            }
        });
    });
</script>
