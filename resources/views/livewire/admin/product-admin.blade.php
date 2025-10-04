<div class="flex">
    <x-sidebar-admin />

    <x-content-admin>
        @can('admin.product.create')
            <div class="flex justify-end w-full">
                @livewire('modal.admin.create-product')
            </div>
        @endcan
        <section class="mt-10 ">
            <article class="grid w-full grid-cols-3 gap-3">
                {{-- trae todo los productos nuevos enviados  --}}
                @forelse($products as $product)
                    <div class="bg-gray-200 shadow-lg hover:bg-white shadow-slate-400">
                        <div class="w-full ">
                            <img class="object-cover w-full h-52 rounded-t-md" src="{{ Storage::url($product->photo) }}"
                                alt="">
                        </div>
                        <div class="p-2">
                            <div class="w-full mt-2">
                                <div class="mb-1 text-2xl font-extrabold text-center">{{ $product->name }}</div>
                                <hr>
                                <div class="my-2 text-lg font-bold">{{ $product->title }}</div>
                                <div id="contentEval"
                                    class="flex-wrap-reverse mt-1 overflow-hidden overflow-y-auto text-justify h-28">
                                    {{ $product->description }}
                                </div>
                                <div class="flex justify-between py-3 mt-3">
                                    <h1><b>Precio:</b> {{ $product->price }} </h1>
                                </div>
                            </div>
                            <div class="flex justify-end w-full gap-5 px-2 mt-2">
                                <div class="text-center cursor-pointer">

                                    <a wire:click="editConfirm({{ $product->id }})">
                                        <i
                                            class="p-1 text-blue-700 rounded hover:text-white hover:bg-blue-700 fa-solid fa-edit"></i>
                                    </a>
                                </div>

                                <div class="text-center cursor-pointer group">
                                    <a wire:click="confirmDelete({{ $product->id }})">
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

                    @if ($openDelete)
                        <div class="fixed inset-0 z-50 flex items-center justify-center"
                            wire:click="$set('openDelete', false)">
                            <div class="absolute inset-0 z-40 bg-black bg-opacity-30"></div>
                            <div
                                class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-red-500 rounded-xl md:max-w-md">

                                <!-- Contenido del modal -->
                                <div class="flex gap-3 py-2 bg-red-500 border border-red-500">
                                    <h3 class="w-full text-2xl text-center text-gray-100 ">Eliminar</h3>
                                </div>
                                <div class="px-6 py-4 text-left">
                                    <p class="text-xl text-gray-500">
                                        ¿Estás seguro de que deseas eliminar este producto?
                                    </p>
                                    <div class="mt-4 text-center">
                                        <x-secondary-button wire:click="$set('openDelete', false)"
                                            class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400 hover:bg-gray-400">
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
                        <div class="fixed inset-0 z-50 flex items-center justify-center">
                            <div class="absolute inset-0 z-40 bg-black bg-opacity-30"></div>
                            <div
                                class="z-50 w-11/12 h-3/4 mx-auto overflow-y-auto bg-white border border-blue-700 rounded-xl md:max-w-md">

                                <!-- Contenido del modal -->
                                <div class="flex gap-3 py-2 bg-blue-700 border border-blue-700">
                                    <h3 class="w-full text-2xl text-center text-gray-100 ">Editar</h3>
                                </div>
                                <div class="px-6 py-4 text-left">
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
                                            <x-label for="contentProductDescription">Contenido del producto</x-label>
                                            <textarea wire:model='contentProductDescription' class="w-full rounded-md border-gray-300" cols="30" rows="3"></textarea>
                                            <x-input-error for="contentProductDescription" />
                                        </div>
                                        <div class="my-1">
                                            <x-label for="quantity">cantidad de productos disponible</x-label>
                                            <x-input class="w-full" type="text" wire:model='quantity'/>
                                            <x-input-error for="quantity" />
                                        </div>
                                        <div class="my-1">
                                            <x-label for="price">Precio del producto</x-label>
                                            <x-input class="w-full" type="text" wire:model='price'/>
                                            <x-input-error for="price" />
                                        </div>
                                        <div class="my-1">
                                            <x-label for="status">Estado del producto</x-label>
                                            <x-input class="w-full" type="text" wire:model='status'/>
                                            <x-input-error for="status" />
                                        </div>
                                        
                                    </div>
                                    <div class="mt-4 text-center">
                                        <x-secondary-button wire:click="$set('openEdit', false)"
                                            class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400 hover:bg-gray-400">
                                            Cancelar
                                        </x-secondary-button>
                                        <x-secondary-button wire:click="editConfirmed"
                                            class="mr-4 boton shadow-lg hover:text-gray-50 hover:shadow-red-400 hover:bg-red-400">
                                            Editar
                                        </x-secondary-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <p class="">No hay productos</p>
                @endforelse
            </article>
        </section>
    </x-content-admin>
</div>
