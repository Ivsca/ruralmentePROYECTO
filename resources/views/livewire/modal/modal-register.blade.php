    <div>
        <x-dialog-modal maxWidth="xl">
            <x-slot name="title" >
                <div class="flex justify-end"><button wire:click="closeRegister">Cerrar</button></div>
                
            </x-slot>

            <x-slot name="content">
                <x-authentication-card-logo />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <article class="grid grid-cols-2 gap-2">
                    <div class="">
                        <x-label for="documentType">Tipo de documento</x-label>
                        <select class="w-full rounded-lg border-gray-300" wire:model='documentType'>
                            <option selected hidden value="">tipo de documento</option>
                            <option value="C.C">Cedula de ciudadania</option>
                            <option value="T.I">Targeta de identidad</option>
                            <option value="C.E">Cedula Extrangera</option>
                        </select>
                        <x-input-error for="documentType"/>
                    </div>
                    <div>
                        <x-label for="document">Numero de documento</x-label>
                        <x-input class="w-full " wire:model='document'/>
                        <x-input-error for="document"/>
                    </div>
                </article>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <x-label for="name">nombre</x-label>
                        <x-input class="w-full " wire:model='name'/>
                        <x-input-error for="name"/>
                    </div>
                    <div>
                        <x-label for="lastName">Apellido</x-label>
                        <x-input class="w-full " wire:model='lastName'/>
                        <x-input-error for="lastName"/>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <x-label for="sex">Sexo</x-label>
                        <select class="w-full rounded-lg border-gray-300" wire:model='sex'>
                            <option selected hidden>Seleccione un sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <x-input-error for="sex"/>
                    </div>
                    <div>
                        <x-label for="birthDate">Fecha de nacimiento</x-label>
                        <x-input class="w-full " type="date" wire:model='birthDate'/>
                        <x-input-error for="birthDate"/>
                    </div>
                </div>

                <div>
                    <x-label for="phone">Telefono</x-label>
                    <x-input class="w-full " wire:model='phone'/>
                    <x-input-error for="phone"/>
                </div>

                <div class="grid grid-cols-3 gap-2">
                    <div>
                        <x-label for="country">Pais</x-label>
                        <x-input class="w-full " wire:model='country'/>
                        <x-input-error for="country"/>
                    </div>
                    <div>
                        <x-label for="department">Departamento</x-label>
                        <x-input class="w-full " wire:model='department'/>
                        <x-input-error for="department"/>
                    </div>
                    <div>
                        <x-label for="city">Ciudad</x-label>
                        <x-input class="w-full " wire:model='city'/>
                        <x-input-error for="city"/>
                    </div>
                </div>

                <div>
                    <x-label for="address">Direccion</x-label>
                    <x-input class="w-full " wire:model='address'/>
                    <x-input-error for="address"/>
                </div>

                <div>
                    <x-label for="email">Correo electronico</x-label>
                    <x-input class="w-full " type="email" wire:model='email'/>
                    <x-input-error for="email"/>
                </div>

                <div>
                    <x-label for="password">Contraseña</x-label>
                    <x-input class="w-full " type="password " wire:model='password'/>
                    <x-input-error for="password"/>
                </div>



                {{-- <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div> --}}

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                {{--  <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>--}}
                    
                    <x-button class="bg-gray-500 text-white p-3 rounded-md" wire:click="createUser">registar</x-button>
                </div> 
            </x-slot>

            <x-slot name="footer">

            </x-slot>
        </x-dialog-modal>
    </div>
