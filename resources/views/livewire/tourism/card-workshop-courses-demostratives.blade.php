<div>
    <div class="grid grid-cols-2 gap-3">
        @forelse ($workshopCouses as $work)
            @if ($work->categoryEvent === 'Demostrativo')
            <div class="flex gap-3 px-2 py-3 bg-gray-200 rounded-md shadow-md">
                {{-- imagen del taller --}}
                <div class="bg-gray-500 rounded-md">
                    <img class="w-[40vh] h-[40vh] rounded-md object-cover" src="{{ Storage::url($work->photo) }}"
                        alt="imagen de producto">
                </div>
                {{-- contenido del taller --}}
                <div class="w-[60vh] p-2 flex flex-col justify-around">
                    <div class="text-3xl font-bold">{{$work->name}}</div>
                    <div>$ {{ number_format($work->price, 0)}}</div>
                    <div class="p-1 mt-5 bg-gray-400 rounded-md shadow-lg">
                        <p class="text-base text-black ">{{$work->description}}</p>
                    </div>
                    <div class="flex justify-end">
                        @livewire('modal.tourism.workshop-info', ['workshopId'=> $work->id])
                    </div>
                </div>
            </div>
            @endif
        @empty
            <div class="h-40">
                <p>No hay talleres demostrativos</p>
            </div>
        @endforelse
    </div>
</div>
