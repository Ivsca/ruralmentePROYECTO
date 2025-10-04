<div class="flex">
    <x-sidebar-admin />

    <x-content-admin>
        <div class="w-full flex justify-end">
            @livewire('modal.admin.create-group')
        </div>
        <section class="mt-10">
            <div class="grid grid-cols-2  gap-3">
                @foreach ($groups as $group)
                    <div class="w-full flex bg-gray-300 p-2 rounded-md gap-2 shadow-lg">
                        <div class="w-[40vh]">
                            {{-- imagen de la persona --}}
                            <img class="h-[30vh] w-full object-cover rounded-md "
                                src="{{ Storage::url($group->photo) }}" alt="imkage">
                        </div>
                        <div class="flex flex-col gap-2 items-center w-auto">
                            <div>
                                <h1 class="font-bold">{{ $group->users->name }} {{ $group->users->lastName }} </h1>
                            </div>

                            <div class="w-[50vh]">
                                <h1 class="">Correo electronico</h1>
                                <p>{{ $group->users->email }}</p>
                            </div>
                            <div class="w-[50vh]">
                                <h1 class="text-center text-lg font-medium">Descrición</h1>
                                <p class="p-3 bg-gray-200 text-sm rounded-md shadow-md">{{ $group->description }}</p>
                            </div>
                            <div class="w-full flex justify-end mt-3">
                                @livewire('modal.ViewInfoGroup', ['groupId' => $group->id])
                            </div>
                        </div>
                    </div>
                @endforeach

        </section>
    </x-content-admin>
</div>
