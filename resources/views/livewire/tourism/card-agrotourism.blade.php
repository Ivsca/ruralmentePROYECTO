<div class="grid grid-cols-2 gap-4">
    {{-- carta de los agroturismos --}}
    @forelse ($workshopAgros as $workshopAgro)
        <div class="flex gap-3 px-2 py-3 bg-gray-200 rounded-md shadow-md shadow-gray-400">
            {{-- imagen del taller --}}
            <div class="bg-gray-500 rounded-md">
                <img class="w-[40vh] h-[40vh] rounded-md object-cover" src="{{ Storage::url($workshopAgro->photo) }}"
                    alt="imagen de producto">
            </div>
            {{-- contenido del taller --}}
            <div class="w-[60vh] p-2 flex flex-col justify-around">
                <div class="text-3xl font-bold">{{$workshopAgro->name}}</div>
                <div class="p-1 mt-5 bg-gray-400 rounded-md shadow-lg">
                    <p class="text-lg font-bold ">{{$workshopAgro->title}}</p>
                    <p class="text-base text-black ">{{$workshopAgro->description}}</p>
                </div>
                <div class="flex justify-end">
                    @livewire('modal.tourism.agro-info', ['workshopId'=>$workshopAgro->id])
                </div>
            </div>
        </div>
    @empty
        <div class="h-80">
            <p>no hay agroturismo</p>
        </div>
    @endforelse
</div>
