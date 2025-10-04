<div class="flex">
    <x-sidebar-admin />
    <x-content-admin>
        <div class="w-full flex justify-end gap-4">
            @livewire('modal.admin.create-category')
        </div>
        <table class="w-3/6 bg-gray-200 my-4 rounded-md p-3 shadow-lg shadow-gray-400 overflow-hidden">
            <thead class="bg-gray-400">
                <th class="py-2 whitespace-nowrap">
                    id
                </th>
                <th class="py-2 whitespace-nowrap">
                    nombre de la categoria
                </th>
                <th class="py-2 whitespace-nowrap w-32">
                    Acciones
                </th>
            </thead>
            @forelse ($categoryPlans as $category)
                <tbody>
                    <td class="pl-2 whitespace-nowrap my-1">{{ $category->id }}</td>
                    <td class="whitespace-nowrap my-1">{{ $category->name }}</td>
                    <td class="whitespace-nowrap flex justify-end gap-2 mr-2 my-1">
                        <div class="text-center cursor-pointer group"
                            wire:click="confirmEditCategory({{ $category->id }})">
                            <button class="hover:bg-blue-700 hover:text-white p-1 rounded-md text-blue-700"><i
                                    class="fa-solid fa-edit"></i></button>
                        </div>


                        <div class="text-center cursor-pointer group">
                            <a wire:click="confirmDeleteCategory({{ $category->id }})">
                                <i
                                    class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
                                <div
                                    class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                                    Eliminar
                                    <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px"
                                        viewBox="0 0 255 255" xml:space="preserve">
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </td>
                </tbody>

            @empty
                <tbody>
                    <p>no hay categorias</p>
                </tbody>
            @endforelse
        </table>
        @if ($openDeleteCategory)
            <div class="fixed inset-0 z-50 flex items-center justify-center"
                wire:click="$set('openDeleteCategory', false)">
                <div class="absolute inset-0 z-40 bg-black bg-opacity-30"></div>
                <div
                    class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-red-500 rounded-xl modal-container md:max-w-md">

                    <!-- Contenido del modal -->
                    <div class="flex gap-3 py-2 bg-red-500 border border-red-500">
                        <h3 class="w-full text-2xl text-center text-gray-100 ">Eliminar {{ $category->id }}</h3>
                    </div>
                    <div class="px-6 py-4 text-left modal-content">
                        <p class="text-xl text-gray-500">
                            ¿Estás seguro de que deseas eliminar esta categoria?
                        </p>
                        <div class="mt-4 text-center">
                            <x-secondary-button wire:click="$set('openDeleteCategory', false)"
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
        @elseif ($openUpdateCategory)
            <div class="fixed inset-0 z-50 flex items-center justify-center">
                <div class="absolute inset-0 z-40 bg-black bg-opacity-30">
                </div>
                <div
                    class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border rounded-xl modal-container md:max-w-md">

                    <!-- Contenido del modal -->
                    <div class="flex gap-3 py-2 bg-blue-600 border border-blue-700">
                        <h3 class="w-full text-2xl text-center text-gray-100 ">Editar {{ $category->id }}</h3>
                        <button wire:click="$set('openUpdateCategory', false)" class="w-10 text-white">
                            <i class="fa-solid fa-xmark fa-xl"></i>
                        </button>
                    </div>
                    <div class="px-6 py-4 text-left modal-content">
                        <div class="w-full">
                            <x-label for="name" class="text-xl text-black font-bold">Nombre de la categoria a
                                edtar</x-label>
                            <x-input type="text" wire:model='name' class="w-full " />
                            <x-input-error for="name" />
                        </div>
                        <div class="mt-4 text-center">
                            <x-secondary-button wire:click="$set('openUpdateCategory', false)"
                                class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400 hover:bg-gray-400">
                                Cancelar
                            </x-secondary-button>
                            <x-secondary-button wire:click="updateConfirmation"
                                class="mr-4 text-blue-700 border border-blue-700 shadow-lg hover:text-gray-50 hover:shadow-blue-400 hover:bg-blue-400">
                                Editar
                            </x-secondary-button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </x-content-admin>
</div>
