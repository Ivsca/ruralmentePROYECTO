<x-app-layout>
    <div class="flex justify-center mt-3">
        <div class="w-11/12">
            <p class="text-center font-extrabold text-3xl uppercase underline my-3">Agenda de eventos</p>
            <div class="w-full rounded-md bg-gray-300 mt-2 p-3 gap-2 flex">
                <div class="w-full">
                    <p class="text-2xl uppercase font-bold my-2">Mis datos</p>
                    <div class="">
                        <div class="grid grid-cols-2 gap-2 my-2">
                            <div>
                                <x-label for="name">Nombre</x-label>
                                <x-input type="text" wire:model='name' class="w-full bg-gray-200" value="{{$user->name}}" disabled />
                                <x-input-error for="name" />
                            </div>
                            <div>
                                <x-label for="lastName">Apellido</x-label>
                                <x-input type="text" wire:model='lastName' class="w-full bg-gray-200" value="{{$user->lastName}}" disabled />
                                <x-input-error for="lastName" />
                            </div>
                        </div>
                        <div class="my-2 grid grid-cols-2 gap-2" >
                            <div>
                                <x-label for="document">Numero de documento</x-label>
                                <div class="flex flex-row items-center gap-3 bg-gray-200 rounded-md px-1">
                                    <p class="text-xl font-semibold">{{$user->documentType}}</p>
                                    <x-input wire:model='document' type="text" disabled class="w-full bg-inherit focus:outline-none pl-1 border-none" value="{{$user->document}}" />
                                </div>
                                <x-input-error for="document" />
                            </div>
                            <div>
                                <x-label for="phone">Numero de telefono</x-label>
                                <x-input type="text" wire:model='phone' class="w-full bg-gray-200" value="{{$user->phone}}" disabled />
                                <x-input-error for="phone" />
                            </div>
                        </div>
                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div>
                                <x-label for="country">Pais</x-label>
                                <x-input type="text" wire:model='country' class="w-full bg-gray-200" value="{{$user->country}}" disabled />
                                <x-input-error for="country" />
                            </div>
                            <div>
                                <x-label for="department">Departamento</x-label>
                                <x-input type="text" wire:model='department' class="w-full bg-gray-200" value="{{$user->department}}" disabled />
                                <x-input-error for="department" />
                            </div>
                            <div>
                                <x-label for="city">Ciudad</x-label>
                                <x-input type="text" wire:model='city' class="w-full bg-gray-200" value="{{$user->city}}" disabled />
                                <x-input-error for="city" />
                            </div>
                        </div>
                        <div>
                            <x-label for="address">Dirección</x-label>
                            <x-input type="text" wire:model='address' class="w-full bg-gray-200" value="{{$user->address}}" disabled />
                            <x-input-error for="address" />
                        </div>
                        <div class="flex justify-around my-2 text-white">
                            {{-- <button class="px-2 py-1 rounded-md bg-blue-600" wire:click='editInfoUser'><i class="fa-solid fa-edit m-1"></i> Actualizar</button> --}}
                            <button class="px-2 py-1 rounded-md bg-teal-700"><i class="fa-brands fa-pagelines m-1"></i>Continuar con el pago</button>
                        </div>
                    </div>
                </div>
                <div class="w-[60vh] border-l-1 border-black px-2">
                    <p class="uppercase font-bold">Sistema de pago</p>
                    <div class="flex justify-center">
                        <img class="h-52" src="{{Storage::url($workshopId->photo)}}" alt="">
                    </div>
                    <div class="mt-2">
                        <h2 class="font-bold">Nombre del evento</h2>
                        <p> {{$workshopId->name}} </p>
                    </div>
                    <hr class="border-black">
                    <div class="flex justify-between my-2">
                        <h2 class="font-bold">Precio total:</h2>
                        <p>$ {{number_format($workshopId->price, 0)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
