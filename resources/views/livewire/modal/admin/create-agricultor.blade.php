<div class="flex">
    <x-sidebar-admin />
    <x-content-admin >
        <div class="p-2 mt-5 bg-gray-300 rounded-md shadow-lg ">
            <div class="flex justify-center w-full bg-green-700 rounded-md ">
                <h1 class="py-1 text-2xl text-gray-100">
                    Nuevo agricultor
                </h1>
            </div>                
                <div class="grid grid-cols-2 gap-3">
                    <div class="my-3">
                        <x-label class="text-lg font-semibold text-black" for="id_membership">Plan para el agricultor</x-label>
                        <select wire:model="id_membership" class="w-full border-gray-300 rounded-md">
                            <option selected hidden>Seleccione una plan</option>
                            @foreach ($planes as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="id_membership" />
                    </div>
                    <div class="my-3">
                        <x-label class="text-lg font-semibold text-black" for="id_category">categoria de los agricultores</x-label>
                        <select wire:model="id_category" class="w-full border-gray-300 rounded-md">
                            <option selected hidden>Seleccione una categoria</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="id_category" />
                    </div>
                    
                </div>
                <div class="my-5">
                    <h2 class="text-xl font-bold text-center underline underline-offset-2">Datos personales del agricultor</h2>
                </div>
                <div class="grid grid-cols-4 gap-2 my-2">
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="name">Nombre</x-label>
                        <x-input class="w-full" type="text" wire:model='name'/>
                        <x-input-error for="name"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="lastName">Apellido</x-label>
                        <x-input class="w-full" type="text" wire:model='lastName'/>
                        <x-input-error for="lastName"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="sex">Sexo</x-label>
                        <select class="w-full border-gray-300 rounded-md" wire:model='sex'>
                            <option selected hidden>seleccione sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <x-input-error for="sex"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="occupation">Ocupacion del agricultor</x-label>
                        <x-input class="w-full" type="text" wire:model='occupation'/>
                        <x-input-error for="occupation"/>
                    </div>
                </div>
                
                {{-- segunda fila de los datos personales --}}

                <div class="grid grid-cols-4 gap-2 my-2">
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="email">Correo electronico</x-label>
                        <x-input class="w-full" type="email" wire:model='email'/>
                        <x-input-error for="email"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="phone">Telefono</x-label>
                        <x-input class="w-full" type="text" wire:model='phone'/>
                        <x-input-error for="phone"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="documentType">Tipo de documento</x-label>
                        <select class="w-full border-gray-300 rounded-md" wire:model='documentType'>
                            <option selected hidden>seleccione tipo de documento</option>
                            <option value="C.C">Cedula de Ciudadania</option>
                            <option value="T.I">Targeta de identidad</option>
                            <option value="C.E">Cedula de Extrangeria</option>
                        </select>
                        <x-input-error for="documentType"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="document">Numero de documento</x-label>
                        <x-input class="w-full" type="text" wire:model='document'/>
                        <x-input-error for="document"/>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 my-2">
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="civilStatus">Estado civil</x-label>
                        <select class="w-full border-gray-300 rounded-md" wire:model='civilStatus'>
                            <option selected hidden>seleccione estado civil</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Union libre">Union libre</option>
                            <option value="Soltero(a)">Soltera(a)</option>
                            <option value="Viudo(a)">Viudo(a)</option>
                        </select>
                        <x-input-error for="civilStatus"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="scholarship">Escolaridad</x-label>
                        <select class="w-full border-gray-300 rounded-md" wire:model='scholarship'>
                            <option selected hidden>seleccione escolaridad</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Tecnica">Tecnica</option>
                            <option value="Tecnologia">Tecnologia</option>
                            <option value="Carrera universitaria">Carrera universitaria</option>
                        </select>
                        <x-input-error for="scholarship"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="birthDate">Fecha de nacimiento</x-label>
                        <x-input class="w-full" type="date" wire:model='birthDate'/>
                        <x-input-error for="birthDate"/>
                    </div>
                </div>
                
                <div class="my-5 text-xl">
                    <p class="font-bold text-center underline underline-offset-2">Datos de la vivienda y familiares</p>
                </div>
                
                <div class="grid grid-cols-4 gap-2 my-3">
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="country">Pais</x-label>
                        <x-input class="w-full" type="text" wire:model='country'/>
                        <x-input-error for="country"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="department">Departamento</x-label>
                        <x-input class="w-full" type="text" wire:model='department'/>
                        <x-input-error for="department"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="city">Ciudad</x-label>
                        <x-input class="w-full" type="text" wire:model='city'/>
                        <x-input-error for="city"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="address">Dirección</x-label>
                        <x-input class="w-full" type="text" wire:model='address'/>
                        <x-input-error for="address"/>
                    </div>
                </div>
                
                <div class="grid grid-cols-4 gap-3 my-5">
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="corregimiento">corregimiento</x-label>
                        <x-input class="w-full" type="text" wire:model='corregimiento'/>
                        <x-input-error for="corregimiento"/>
                    </div> 
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="zoneType">Tipo de zona</x-label>
                        <select class="w-full border-gray-300 rounded-md" wire:model='zoneType'>
                            <option selected hidden>seleccione tipo de zona</option>
                            <option value="Urbana">Urbana</option>
                            <option value="Rural">Rural</option>
                            <option value="Metropolitana">Metropolitana</option>
                        </select>
                        <x-input-error for="zoneType"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="distibution">Hectarias</x-label>
                        <x-input class="w-full" type="text" wire:model='distibution'/>
                        <x-input-error for="distibution"/>
                    </div>
                    <div>
                        <x-label class="text-lg font-semibold text-black" for="stratum">Estrato</x-label>
                        <select class="w-full border-gray-300 rounded-md" wire:model='stratum'>
                            <option selected hidden>seleccione el estrato</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <x-input-error for="stratum"/>
                    </div>
                </div>
            
                <div class="flex justify-end">
                    <button wire:click='createAgricultor' wire:change='createAgricultor' class="px-4 py-2 font-extrabold text-white bg-green-800 rounded-md" >Agregar el agricultor</button>
                </div>
        </div>
    </x-content-admin>
</div>

