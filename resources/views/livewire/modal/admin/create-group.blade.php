<div>
    <button class="bg-green-500 px-4 py-2 rounded-md text-white shadow-lg shadow-gray-400"
        wire:click="set('openAdmin', true)"> <i class="fa-solid fa-user-plus mr-1"></i> Añadir</button>

    <x-dialog-modal maxWidth="4xl" wire:model="openAdmin">
        <x-slot name="title">
            <div class="flex justify-end">
                <button wire:click="set('openAdmin', false)" class="">Cerrar</button>
            </div>

        </x-slot>

        <x-slot name="content">
            <div class="bg-green-700 w-full rounded-md flex justify-center ">
                <h1 class="text-2xl text-gray-100">
                    Nuevo integrante
                </h1>
            </div>

            <div class="flex flex-wrap gap-4 w-full justify-center my-2">
                @if ($photo)
                    <img class="w-[50vh] h-[30vh] object-cover" src="{{ $photo->temporaryUrl() }}" alt="Image Preview">
                @else
                    <img class="w-[30vh] h-[30vh]" src="{{ asset('logos/Merca_rural_negro.png') }}"
                        alt="imagen por defecto">
                @endif
            </div>

            <div class="w-full grid grid-cols-2 gap-2">
                <div class="my-2">
                    <x-label for="documentType">Tipo de documento</x-label>
                    <select wire:model='documentType' class="w-full rounded-md border-gray-300">
                        <option selected hidden value="">Seleccione aquí</option>
                        <option value="C.C">Cedula de Ciudadania</option>
                        <option value="T.I">Tarjeta de identidad</option>
                        <option value="C.E">Cedula extrangeria</option>
                    </select>
                    <x-input-error for="documentType" />
                </div>
                <div class="w-full my-2">
                    <x-label for="document">N° de documento</x-label>
                    <x-input id="Number" class="w-full" wire:model='document' />
                    <x-input-error for="document" />
                </div>
            </div>
            <div class="w-full grid grid-cols-2 gap-2">
                <div class="w-full my-2">
                    <x-label for="name">Nombre</x-label>
                    <x-input class="w-full" wire:model='name' />
                    <x-input-error for="name" />
                </div>
                <div class="w-full my-2">
                    <x-label for="lastName">Apellidos</x-label>
                    <x-input class="w-full" wire:model='lastName' />
                    <x-input-error for="lastName" />
                </div>
            </div>

            <div class="w-full grid grid-cols-2 gap-2   ">
                <div class="w-full ">
                    <x-label for="email">Correo Electronico</x-label>
                    <x-input type="email" class="w-full" wire:model="email" />
                    <x-input-error for="email" />
                </div>
                <div class="w-full ">
                    <x-label for="sex">Sexo</x-label>
                    <select wire:model="sex"
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option selected hidden value="">Seleccione</option>
                        <option value="Masculino">Masculino </option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <x-input-error for="sex" />
                </div>
            </div>

            <article class="w-full gap-2 grid grid-cols-3">
                <div>
                    <x-label for="department">Departamento</x-label>
                    <x-input type="text" class="w-full" wire:model='department' />
                    <x-input-error for="department" />
                </div>
                <div class="w-auto">
                    <x-label for="city">Ciudad</x-label>
                    <x-input class="w-full" wire:model='city' />
                    <x-input-error for="city" />
                </div>
                <div>
                    <x-label for="address">Direccion</x-label>
                    <x-input class="w-full" wire:model='address' />
                    <x-input-error for="address" />
                </div>
            </article>

            <div class="grid grid-cols-3 gap-4">
                <div class="my-2">
                    <x-label for="photo">Selecciona la imagen de perfil</x-label>
                    <x-input type="file" wire:model="photo" class="w-full" accept="image/png, image/jpeg, image/jpg"
                        wire:change="resetPreview" />
                    <x-input-error for="photo" />
                </div>
                <div class="my-2">
                    <x-label for="birthDate">Fecha de nacimiento</x-label>
                    <x-input type="date" wire:model="birthDate" class="w-full" />
                    <x-input-error for="birthDate" />
                </div>
                <div class="my-2">
                    <x-label for="phone">N° de telefono</x-label>
                    <x-input id="Number" class="w-full" type="text" wire:model="phone"/>
                    <x-input-error for="phone" />
                </div>
            </div>
            <div class="my-2">
                <x-label for="description">Descripcion para el nuevo miembro</x-label>
                <textarea class="w-full rounded-lg border-gray-300" wire:model='description'></textarea>
                <x-input-error for="description" />
            </div>

            <div>
                <label for="">listado de permisos</label>
                <div class="grid grid-cols-4">
                    @foreach ($permisos as $permiso)
                        <div>
                            <label for="permiso">
                                <x-input type="checkbox" wire:model='permiso.{{$permiso->id}}' value="{{$permiso->id}}" class="mr-2" />
                                {{$permiso->description}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click='createGroup'>Enviar</x-secondary-button>
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
