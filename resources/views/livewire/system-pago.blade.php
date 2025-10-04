<x-app-layout>
    <div class="flex justify-center">
        <div class="flex gap-4 w-11/12 mt-3">
            <div class="w-3/4">
                <p class="font-bold underline text-2xl uppercase">Datos personales</p>
                <div class="mt-5 rounded-md bg-gray-300 p-3 shadow-md shadow-gray-400">
                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <x-label>Documento</x-label>
                            <div class="flex h-8 w-full bg-white rounded-md items-center">
                                <p class="m-1 text-xl">{{$user->documentType}}</p>
                                <x-input  class="h-8 w-full bg-transparent border-none" value="{{$user->document}}" />
                            </div>
                        </div>
                        <div>
                            <x-label>Nombre(s)</x-label>
                            <x-input  class="h-8 w-full" value="{{$user->name}}" disabled />
                        </div>
                        <div>
                            <x-label>Apellido(s)</x-label>
                            <x-input class="h-8 w-full"  value="{{$user->lastName}}" disabled />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="my-3">
                            <x-label>Numero de telefono</x-label>
                            <x-input class="h-8 w-full" value="{{$user->phone}}" disabled />
                        </div>
                        <div class="my-3">
                            <x-label>Direccion</x-label>
                            <x-input class="h-8 w-full" value="{{$user->address}}" disabled/>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="my-3">
                            <x-label>Departamento</x-label>
                            <x-input class="h-8 w-full" value="{{$user->country}}" disabled/>
                        </div>
                        <div class="my-3">
                            <x-label>Departamento</x-label>
                            <x-input class="h-8 w-full" value="{{$user->department}}" disabled/>
                        </div>
                        <div class="my-3">
                            <x-label>Ciudad</x-label>
                            <x-input class="h-8 w-full" value="{{$user->city}}" disabled/>
                        </div>
                    </div>
                    
                </div>
                <p class="font-bold underline text-2xl uppercase mt-4">Datos para compra el producto</p>
                <div class="mt-5 rounded-md bg-gray-300 p-3 shadow-md shadow-gray-400">
                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <x-label for="quantityPay">¿Cantidad que deseas comprar?</x-label>
                            <x-input wire:model='quantityPay' class="w-full" type="number"/>
                        </div>
                        <div>
                            <x-label for="wayToPay">Tipo de pago</x-label>
                            <select class="w-full rounded-md border-gray-300 text-black" wire:model='wayToPay'>
                                <option selected hidden>Seleccione una modalidad de pago</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="Efectivo">Efectivo</option>
                            </select>
                        </div>
                        <div>
                            <x-label></x-label>
                            <x-input class="w-full"/>
                        </div>
                    </div>
                </div>
    
                <div class="mt-4 flex justify-around">
                    
                    <a href="" class="p-2 text-white bg-blue-600 rounded-md shadow-md shadow-gray-500">Realizar compra</a>
                </div>
            </div>
            <div class="bg-gray-300 rounded-md p-2 sticky top-16 w-[50vh] shadow-md shadow-gray-400">
                <div class="bg-gray-300 ">
                    <p class="uppercase text-center text-xl font-extrabold my-2">resumen de compra</p>
                    <hr class="border-gray-400">
                    <div class="my-2">
                        <p class="font-semibold">Nombre del producto</p>
                        <p>{{$product->name}}</p>
                    </div>
                    <hr class="border-gray-400">
                    <p class="my-3 flex justify-between">
                        <span class="font-bold">Subtotal:</span> {{number_format($product->price)}}
                    </p>
                    <p class=" flex justify-between">
                        <span class="font-bold">Total:</span> {{number_format($product->price)}}
                    </p>
                    <div id="contentEval" class="h-80 overflow-hidden overflow-y-auto">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>yo>
