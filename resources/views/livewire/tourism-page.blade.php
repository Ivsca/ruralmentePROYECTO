<div class="flex justify-center mt-3">
  <div class="grid grid-cols-5 gap-4">
    @foreach ($workshops as $work)
    <div class="w-60 h-80 bg-gray-300 p-3 flex flex-col gap-1 rounded-2xl">
        <div class="bg-gray-700 rounded-xl overflow-hidden">
            <img class="w-full h-48" src="{{Storage::url($work->photo)}}">
        </div>
        <div cla    ss="flex flex-col gap-4">
          <div class="flex flex-row justify-between">
            <div class="flex flex-col">
              <span class="text-xl font-bold">{{$work->name}}</span>
              <p class="text-xs text-gray-700">{{$work->eventType}}</p>
              <p class="text-xs text-gray-700">{{$work->categoryEvent}}</p>
            </div>
            <p class="text-black">$ <span class="font-bold text-base text-green-700">{{number_format($work->price)}}</span></p>
          </div>
          <div>@livewire('modal.tourism.workshop-info', ['workshopId' => $work->id])</div>
        </div>
      </div>
    @endforeach
  </div>
</div>
