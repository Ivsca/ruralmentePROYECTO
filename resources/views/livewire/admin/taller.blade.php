<div class="flex">
    <x-sidebar-admin />

    <x-content-admin>
        <div class="flex justify-end w-full">
            @livewire('modal.admin.create-taller')
        </div>

        <section class="grid grid-cols-3 gap-3 mt-10">


            @forelse ($workshops as $workshop)
                <div class="gap-4 duration-500 bg-gray-200 rounded-md shadow-lg">
                    <div class="w-full ">
                        <img class="object-cover w-full h-52 rounded-t-md" src="{{ Storage::url($workshop->photo) }}"
                            alt="">
                    </div>
                    <div class="p-2">
                        <div class="w-full mt-2">
                            <div class="mb-1 text-xl font-extrabold text-center"> {{ $workshop->name }}</div>

                            <div>
                                <p class="text-lg font-semibold text-black"> {{ $workshop->title }} </p>
                            </div>
                            <hr class="border-black">
                            <div id="contentEval" class="mt-1 overflow-hidden overflow-y-auto h-28">
                                {{ $workshop->description }}</div>
                            <div class="">
                                <div class="flex justify-between mt-3">
                                    <h2><b>Precio:</b> $ {{ number_format($workshop->price) }}</h2>
                                </div>
                                <div class="flex justify-between">
                                    <h2><b>Participantes:</b> {{ $workshop->participant }}</h2>
                                </div>
                                <div class="flex justify-between">
                                    <h2><b>Duracion del evento:</b> {{ $workshop->duration }}h</h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end w-full gap-5 px-2 mt-2">
                            <button wire:click='editConfirm({{ $workshop->id }})'><i
                                    class="text-blue-800 fa-solid fa-pen-to-square"></i></button>
                            <div class="relative inline-block text-center cursor-pointer group">
                                <a href="#" wire:click="confirmDelete({{ $workshop->id }})">
                                    <i
                                        class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
                                    <div
                                        class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                                        Eliminar
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>

                </div>
                {{-- open modal --}}
                @if ($open)
                    <div class="fixed inset-0 z-50 flex items-center justify-center" wire:click="$set('open', false)">
                        <div class="absolute inset-0 z-40 bg-black bg-opacity-70 modal-overlay"></div>
                        <div
                            class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-red-500 rounded-xl modal-container md:max-w-md">

                            <!-- Contenido del modal -->
                            <div class="flex gap-3 py-2 bg-red-500 border border-red-500">
                                <h3 class="w-full text-2xl text-center text-gray-100 ">Eliminar</h3>
                            </div>
                            <div class="px-6 py-4 text-left modal-content">
                                <p class="text-xl text-gray-500">
                                    ¿Estás seguro de que deseas eliminar este Evento?
                                </p>
                                <div class="mt-4 text-center">
                                    <x-secondary-button wire:click="$set('open', false)"
                                        class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:text-gray-50 hover:shadow-gray-400 hover:bg-gray-400">
                                        Cancelar
                                    </x-secondary-button>
                                    <x-secondary-button wire:click="deleteConfirmed"
                                        class="mr-4 text-red-500 border border-red-500 shadow-lg hover:text-gray-50 hover:shadow-red-400 hover:bg-red-400">
                                        Eliminar
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($openEdit)
                    <div class="fixed inset-0 z-50 flex items-center justify-center" wire:click="$set('open', false)">
                        <div class="absolute inset-0 z-40 bg-black bg-opacity-70 modal-overlay"></div>
                        <div
                            class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-blue-700 rounded-xl modal-container md:max-w-md">

                            <!-- Contenido del modal -->
                            <div class="flex gap-3 py-2 bg-blue-700 border border-blue-700">
                                <h3 class="w-full text-2xl text-center text-gray-100 ">Editar</h3>
                            </div>
                            <div class="px-6 py-4 text-left modal-content">
                                <div class="h-[55vh] overflow-hidden overflow-y-auto">
                                    <div class="my-1">
                                        <x-label for="name">Nombre del producto</x-label>
                                        <x-input class="w-full" type="text" wire:model='name'/>
                                        <x-input-error for="name" />
                                    </div>
                                    <div class="my-1">
                                        <x-label for="title">Titulo</x-label>
                                        <x-input class="w-full" type="text" wire:model='title'/>
                                        <x-input-error for="title" />
                                    </div>
                                    <div class="my-1">
                                        <x-label for="description">Mensaje motivacional</x-label>
                                        <textarea wire:model='description' class="w-full rounded-md border-gray-300" cols="30" rows="2"></textarea>
                                        <x-input-error for="description" />
                                    </div>
                                    <div class="my-1">
                                        <x-label for="participant">cantidad de productos disponible</x-label>
                                        <x-input class="w-full" type="text" wire:model='participant'/>
                                        <x-input-error for="participant" />
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="my-1">
                                            <x-label for="price">Precio del producto</x-label>
                                            <x-input class="w-full" type="text" wire:model='price'/>
                                            <x-input-error for="price" />
                                        </div>
                                        <div class="my-1">
                                            <x-label for="duration">Durabilidad del evento</x-label>
                                            <x-input class="w-full" type="text" wire:model='duration'/>
                                            <x-input-error for="duration" />
                                        </div>
                                    </div>
                                    <div class="my-1">
                                        <x-label for="location">Estado del producto</x-label>
                                        <x-input class="w-full" type="text" wire:model='location'/>
                                        <x-input-error for="location" />
                                    </div>
                                    
                                </div>
                                <div class="mt-4 text-center">
                                    <x-secondary-button wire:click="$set('openEdit', false)"
                                        class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:text-gray-50 hover:shadow-gray-400 hover:bg-gray-400">
                                        Cancelar
                                    </x-secondary-button>
                                    <x-secondary-button wire:click="confirmedEdit"
                                        class="mr-4 boton  shadow-lg hover:text-gray-50 hover:shadow-red-400 hover:bg-red-400">
                                        Editar
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @empty
            @endforelse
            {{-- {{ $workshop->links() }} --}}
        </section>
    </x-content-admin>
</div>
