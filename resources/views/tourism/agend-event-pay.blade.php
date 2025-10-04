<x-app-layout>
    @auth()
        
    <div class="flex justify-center mt-3">
      <div class="w-11/12">
          <p class="my-3 text-3xl font-extrabold text-center underline uppercase">Agenda de eventos</p>
          <div class="flex w-full gap-2 p-3 mt-2 bg-gray-300 rounded-md">
              <div class="w-full">
                  <p class="my-2 text-2xl font-bold uppercase">Mis datos</p>
                  <div class="grid grid-cols-2 gap-2 my-2">
                      <div>
                          <x-label for="name">Nombre</x-label>
                          <x-input type="text" wire:model='name' class="w-full bg-gray-200" disabled />
                          <x-input-error for="name" />
                      </div>
                      <div>
                          <x-label for="lastName">Apellido</x-label>
                          <x-input type="text" wire:model='lastName' class="w-full bg-gray-200" disabled />
                          <x-input-error for="lastName" />
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 my-2" >
                      <div>
                          <x-label for="document">Numero de documento</x-label>
                          <div class="flex flex-row items-center gap-3 px-1 bg-gray-200 rounded-md">
                              {{-- <p class="text-xl font-semibold">{{$documentType}}</p> --}}
                              <x-input wire:model='document' type="text" disabled class="w-full pl-1 border-none bg-inherit focus:outline-none" />
                          </div>
                          <x-input-error for="document" />
                      </div>
                      <div>
                          <x-label for="phone">Numero de telefono</x-label>
                          <x-input type="text" wire:model='phone' class="w-full" />
                          <x-input-error for="phone" />
                      </div>
                  </div>
                  <div class="grid grid-cols-3 gap-2 my-2">
                      <div>
                          <x-label for="country">Pais</x-label>
                          <x-input type="text" wire:model='country' class="w-full" />
                          <x-input-error for="country" />
                      </div>
                      <div>
                          <x-label for="department">Departamento</x-label>
                          <x-input type="text" wire:model='department' class="w-full" />
                          <x-input-error for="department" />
                      </div>
                      <div>
                          <x-label for="city">Ciudad</x-label>
                          <x-input type="text" wire:model='city' class="w-full" />
                          <x-input-error for="city" />
                      </div>
                  </div>
                  <div>
                      <x-label for="address">Dirección</x-label>
                      <x-input type="text" wire:model='address' class="w-full" />
                      <x-input-error for="address" />
                  </div>
                  <div class="flex justify-around my-2 text-white">
                      <button class="px-2 py-1 bg-blue-600 rounded-md" wire:click='editInfoUser'><i class="m-1 fa-solid fa-edit"></i> Actualizar</button>
                      <button class="px-2 py-1 bg-teal-700 rounded-md"><i class="m-1 fa-brands fa-pagelines"></i>Continuar con el pago</button>
                  </div>
              </div>
              <div class="w-[60vh] border-l-1 border-black px-2">
                  <p class="font-bold uppercase">Sistema de pago</p>
                  <div class="bg-red-500 h-52">
                      image
                  </div>
                  <div class="mt-2">
                      <label for="">Nombre del evento</label>
                      <p></p>
                  </div>
                  <hr class="border-black">
              </div>
          </div>
      </div>
    </div>
    @endauth
</x-app-layout>
