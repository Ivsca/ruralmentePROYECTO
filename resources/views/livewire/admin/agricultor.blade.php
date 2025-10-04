<div class="flex">
    <x-sidebar-admin />

    <x-content-admin>
        <div class="flex justify-end w-full gap-4">
            <a href="{{ route('admin.agricultor.createAgricultor') }}"
                class="px-4 py-2 text-white bg-green-500 rounded-md shadow-lg shadow-gray-400"><i
                    class="mr-1 fa-solid fa-user-plus"></i> Añadir agricultor</a>
        </div>
        <section class="mt-10">


            <div class="border border-gray-200 rounded-lg shadow-lg dark:border-gray-700 overflow-hidden ">
                <div class="overflow-x-auto rounded-t-lg">
                    <table
                        class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        <thead class="">
                            <tr>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Nombre del agricultor
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    plan inscrito
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Fecha de inscripciones
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Fecha final
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    Fecha de renovacion
                                </th>
                                <th
                                    class="px-3 py-2 font-extrabold text-gray-900 whitespace-nowrap text-start dark:text-white">
                                    acciones
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            
                            <tr>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Emmanuel
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                    Plan cosecha
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                    
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                    4 sesiones
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                    4 sesiones
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200 flex gap-4">
                                    <a href="#"><i class="fa-solid fa-eye text-green-700 hover:text-white hover:bg-green-700 p-1 rounded-md"></i></a>
                                    <button wire:click='confirmedEdit()'><i class="fa-solid fa-edit text-blue-700 hover:text-white hover:bg-blue-700 p-1 rounded-md"></i></button>
                                    <button wire:click='confirmedDelete()'><i class="fa-solid fa-trash text-red-700 hover:text-white hover:bg-red-700 p-1 rounded-md"></i></button>
                                </td>
                            </tr>

                            
                        </tbody>
                    </table>
                </div>

                
            </div>
        </section>
    </x-content-admin>
</div>
