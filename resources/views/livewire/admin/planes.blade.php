<div class="flex">
    <x-sidebar-admin />

    <x-content-admin>
        @can('admin.planes.create')
            <div class="flex justify-end w-full gap-4">
                @livewire('modal.admin.create-plan')
            </div>
        @endcan
        <section class="mt-10">


            <div class="border border-gray-200 rounded-lg shadow-lg dark:border-gray-700">
                <div class="overflow-x-auto rounded-t-lg">
                    <table
                        class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        <thead class="">
                            <tr>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Planes
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Productores
                                </th>
                                
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Plataforma
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Sesion de los planes
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Telepsicologia
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Dias de campo
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Creación
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Actuaización
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($categoryPlan as $category)
                                
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$category->name}}
                                    </td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                        <p><b>max:</b> {{$category->producers}} productores</p>
                                    </td>
                                    
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                        @if ($category->platform === 'Si')
                                            <p class="bg-green-500 p-1 text-center text-white rounded-md uppercase">Abilitada</p>
                                        @elseif ($category->platform === 'No')
                                            <p class="bg-red-500 p-1 text-center text-white rounded-md uppercase">desabilitada</p>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                        <p>{{$category->quantitySession}} sesiones</p>
                                    </td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                        @if ($category->telepsychologies === 'Si')
                                            <p class="bg-green-500 p-1 text-center text-white rounded-md uppercase">aprobado</p>
                                        @elseif ($category->telepsychologies === 'No')
                                            <p class="bg-red-500 p-1 text-center text-white rounded-md uppercase">desabilitada</p>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                        @if ($category->fieldDay === "Permitido")
                                            <p>{{$category->choiceType}}</p>
                                        @else
                                            <p>No hay dias de campos habilitados</p>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                        {{$category->created_at}}
                                    </td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                        {{$category->updated_at}}
                                    </td>

                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200 flex gap-4">
                                        <button wire:click='confirmedEditPlan({{$category->id}})'><i class="fa-solid fa-edit text-blue-700 p-1 hover:text-white hover:bg-blue-700 rounded-md"></i></button>
                                        <button wire:click='confirmDeleteCategory({{$category->id}})'><i class="fa-solid fa-trash text-red-700 p-1 hover:text-white hover:bg-red-700 rounded-md"></i></button>
                                    </td>
                                </tr>


                                @if ($openDeleteCategory)
                                <div class="fixed inset-0 z-50 flex items-center justify-center" wire:click="$set('openDeleteCategory', false)">
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
                                                <x-secondary-button wire:click="$set('openDeleteCategory', false)"
                                                    class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:text-gray-50 hover:shadow-gray-400 hover:bg-gray-400">
                                                    Cancelar
                                                </x-secondary-button>
                                                <x-secondary-button wire:click="deletePlan"
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
                                                    <x-label for="name">Nombre</x-label>
                                                    <x-input class="w-full" type="text" wire:model='name'/>
                                                    <x-input-error for="name" />
                                                </div>
                                                <div class="my-1">
                                                    <x-label for="quantitySession">Sesiones</x-label>
                                                    <x-input class="w-full" type="text" wire:model='quantitySession'/>
                                                    <x-input-error for="quantitySession" />
                                                </div>
                                                <div class="my-1">
                                                    <x-label for="producers">Productores</x-label>
                                                    <x-input  wire:model='producers' class="w-full" type="text" />
                                                    <x-input-error for="producers" />
                                                </div>
                                                <div class="my-1">
                                                    <x-label for="choiceType">tipo de dia de campo</x-label>
                                                    <textarea wire:model='choiceType' class="w-full rounded-md border-gray-300" cols="30" rows="4"></textarea>
                                                    <x-input-error for="choiceType" />
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

                            
                        </tbody>
                    </table>
                </div>

                <div class="px-4 py-2 border-t border-gray-200 rounded-b-lg dark:border-gray-700">
                    <ol class="flex justify-end gap-1 text-xs font-medium">
                        <li>
                            <a href="#"
                                class="inline-flex items-center justify-center w-8 h-8 text-gray-900 bg-white border border-gray-100 rounded rtl:rotate-180 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <span class="sr-only">Prev Page</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="#"
                                class="block w-8 h-8 leading-8 text-center text-gray-900 bg-white border border-gray-100 rounded dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                1
                            </a>
                        </li>



                        <li>
                            <a href="#"
                                class="inline-flex items-center justify-center w-8 h-8 text-gray-900 bg-white border border-gray-100 rounded rtl:rotate-180 dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                                <span class="sr-only">Next Page</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
    </x-content-admin>
</div>
