<div>
    @forelse ($workshopCouses as $work)
        @if ($work->categoryEvent === 'Practico')
            <div class="bg-gray-200 rounded-md shadow-md  px-2 py-3 flex gap-3">
                {{-- imagen del taller --}}
                <div class="bg-gray-500 rounded-md">
                    <img class="w-[40vh] h-[40vh] rounded-md object-cover" src="{{ Storage::url($work->photo) }}"
                        alt="imagen de producto">
                </div>
                {{-- contenido del taller --}}
                <div class="w-[60vh] p-2 flex flex-col justify-around">
                    <div class="font-bold text-3xl">{{ $work->name }}</div>
                    <div>$ {{ number_format($work->price)}}</div>
                    <div class="bg-gray-400 p-1 rounded-md shadow-lg mt-5">
                        <p class="text-base text-black ">{{ $work->description }}</p>
                    </div>
                    <div class="flex justify-end">
                        @livewire('modal.tourism.workshop-info', ['workshopId' => $work->id])
                    </div>
                </div>
            </div>
        @endif
    @empty
        <div class="h-40">
            <p>No hay talleres practicos</p>
        </div>
    @endforelse
</div>
