<div>
    <button class="bg-cyan-800 px-4 py-2 rounded-md text-white shadow-lg shadow-gray-400"
        wire:click="set('openProduct', true)"><i class="fa-solid fa-user-plus mr-1"></i> Añadir Productos</button>

    <x-dialog-modal wire:model="openProduct">
        <x-slot name="title">
            <div class="focus:border-none flex justify-end items-center">
                <button wire:click="set('openProduct', false)" class=" text-black px-4 py-2 rounded-md"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="bg-cyan-800 w-full rounded-md flex justify-center ">
                <h1 class="text-2xl text-gray-100 py-1">
                    Nuevo producto
                </h1>
            </div>
        </x-slot>

        <x-slot name="content">
            @if (session('msg'))
                <p>{{ session('msg') }}</p>
            @endif

            <div class="flex flex-wrap gap-4 w-full justify-center">
                <div class="w-full" wire:loading wire:target='photo'>
                    <p class="p-2 bg-yellow-200 text-lg rounded-md shadow-md my-2 text-center">Esta cargando la imagen!
                        Espera un momento</p>
                </div>
                @if ($photo)
                    <img class="w-[50vh] border h-[30vh] object-cover" src="{{ $photo->temporaryUrl() }}"
                        alt="Image Preview">
                @else
                    <img class="w-[35vh] border h-[30vh]" src="{{ asset('logos/Merca_rural_negro.png') }}"
                        alt="imagen por defecto">
                @endif
            </div>
            <div class="my-4">
                <x-label class="text-black font-extrabold text-xl" for="nameCategory">¿A que catgoria pertenece este producto?</x-label>
                <select class="border-gray-300 w-full rounded-md" wire:model='categoryProduct'>
                    <option hidden selected value="">Seleccione una categoria</option>
                    <option value="Café felíz">Café felíz</option>
                    <option value="productos para café">productos para café</option>
                    <option value="prendas">prendas</option>
                </select>
                <x-input-error for="nameCategory" />
            </div>
            <div class="grid grid-cols-2 gap-3 my-4">
                <div class="">
                    <x-label class="text-black font-extrabold text-xl" for="name">Nombre de productos</x-label>
                    <x-input class="w-full" type="text" wire:model="name" />
                    <x-input-error for="name" class="" />
                </div>
                <div>
                    <x-label class="text-black font-extrabold text-xl" for="title">Titulo</x-label>
                    <x-input class="w-full" type="text" wire:model="title" />
                    <x-input-error for="title" class="" />
                </div>
            </div>
            <div class="my-4">
                <x-label class="text-black font-extrabold text-xl" for="description">Mensaje motivacional</x-label>
                <x-input class="w-full" type="text" wire:model="description" />
                <x-input-error for="description" class="" />
            </div>
            <div class="my-4">
                <x-label class="text-black font-extrabold text-xl" for="contentProductDescription">Descripciones de el producto</x-label>
                <textarea class="w-full rounded-md border-gray-300" wire:model="contentProductDescription" cols="30" rows="5"></textarea>
                <x-input-error for="contentProductDescription" class="" />
            </div>
            <div class="my-4">
                <x-label class="text-black font-extrabold text-xl" for="imageProduct">Selecciona una imagen</x-label>
                <x-input type="file" class="flex w-full rounded-md border border-blue-300 border-input bg-white text-sm text-gray-400 file:border-0 file:bg-blue-600 file:text-white file:text-sm file:font-medium " wire:model="photo" wire:change="resetPreview"
                    accept="image/png, image/jpeg, image/jpg" />
                <x-input-error for="photo" class="" />

            </div>

            <div class="grid grid-cols-2 gap-3 w-full">
                <div class="w-full">
                    <x-label class="text-black font-extrabold text-xl" for="stock">Cantidad de este
                        producto</x-label>
                    <x-input class="w-full" type="number" wire:model="stock" />
                    <x-input-error for="stock" class="" />
                </div>
                <div>
                    <x-label class="text-black font-extrabold text-xl" for="price">Precio</x-label>
                    <x-input class="w-full" type="text" wire:model="price" />
                    <x-input-error for="price" class="" />
                </div>
            </div>
            <div class="w-full">
                <x-label>Color</x-label>
                <x-input type="color" wire:model='color' class="w-full" />
                <x-input-error for="color" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:target='createProduct, photo'
                wire:click="createProduct">Enviar</x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('imagePreview', function(imageData) {
            var previewImg = document.querySelector('img');
            if (previewImg) {
                previewImg.src = URL.createObjectURL(imageData);
            }
        });
    });
</script>
