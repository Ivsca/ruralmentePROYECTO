<div>
    <button wire:click="set('openInfoGroup', true)" class="p-2 bg-cyan-700 rounded-md text-white">Más
        información...</button>

    <x-dialog-modal wire:model='openInfoGroup' maxWidth="2xl">
        <x-slot name="title">
            <div class="flex justify-end"><button wire:click="set('openInfoGroup', false)"><i
                        class="fa-solid fa-xmark"></i></button></div>
        </x-slot>
        <x-slot name="content">
            <div class="flex flex-col items-center">
                {{-- imagen en la parte superior --}}
                <img class="h-[30vh] w-[30vh] object-cover rounded-md" src="{{ Storage::url($group->photo) }}"
                    alt="">

            </div>
            {{-- informacion personal --}}

            <article class="w-full bg-gray-300 rounded-md mt-4   shadow-md p-2 ">
                <div class="text-lg text-center font-bold text-black">INFORMACIÓN PERSONAL</div>
                <div>
                    <div class="text-center text-black font-bold text-lg mt-6">{{ $group->users->name }}
                    {{ $group->users->lastName }}</div>
                </div>
                <div class="mt-2">
                    <div class="text-black"><span class="font-bold text-base">N° de documento: </span>
                        {{ $group->users->documentType }} {{ $group->users->document }}</div>
                </div>
                <div class="mt-2">
                    <div class="text-black"><span class="font-bold text-base">Sexo:</span>
                        {{ $group->users->sex }}</div>
                </div>
                <div class="my-2">
                    <div class="text-black"><span class="font-bold text-base">Fecha de
                            nacimiento: </span>{{ $group->users->birthDate }}</div>
                </div>
            </article>


            <article class="w-full bg-gray-300 rounded-md mt-4   shadow-md p-2 ">
                {{-- <h1 class="text-lg text-black text-center font-bold">localizacion</h1> --}}
                <div class="mt-2">
                    <h1 class="text-black"><span class="font-bold text-base">Pais: </span>
                        {{ $group->users->country }}</h1>
                </div>
                <div class="mt-2">
                    <h1 class="text-black"><span class="font-bold text-base">departament: </span>
                        {{ $group->users->department }}</h1>
                </div>
                <div class="mt-2">
                    <h1 class="text-black"><span class="font-bold text-base">Ciudad:
                        </span>{{ $group->users->city }}</h1>
                </div>
                <div class="mt-2">
                    <h1 class="text-black"><span class="font-bold text-base">Direccion:
                        </span>{{ $group->users->address }}</h1>
                </div>
            </article>


            {{-- Contactos del usuario --}}
            <article class="w-full bg-gray-300 rounded-md mt-4   shadow-md p-2 ">
                {{-- <h1 class="text-lg text-black text-center font-bold">Contacto</h1> --}}
                <div class="mt-2">
                    <h1 class="text-black"><span class="font-bold text-base">Correo electronico:
                        </span>{{ $group->users->email }}</h1>
                </div>
                <div class="mt-2">
                    <h1 class="text-black"><span class="font-bold text-base">Telefono:
                        </span>{{ $group->users->phone }}</h1>
                </div>
            </article>
        </x-slot>
        <x-slot name="footer">
            <button>Contactar</button>
        </x-slot>
    </x-dialog-modal>
</div>
