<x-guest-layout>
    <x-authentication-card>

        {{-- LINK ELEGANTE PARA VOLVER A LOGIN --}}
        <div class="flex justify-center mb-6">
            <a href="{{ route('login') }}"
               class="text-sm font-semibold text-indigo-500 hover:text-indigo-700 hover:underline transition-all duration-200">
                ← Volver al inicio de sesión
            </a>
        </div>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- NOMBRE COMPLETO --}}
            <div>
                <x-label for="NombreCompleto" value="Nombre completo" />
                <x-input id="NombreCompleto" class="block mt-1 w-full" type="text"
                    name="NombreCompleto" :value="old('NombreCompleto')" required autofocus autocomplete="name" />
            </div>


            {{-- TIPO DE DOCUMENTO --}}
            <div class="mt-4">
                <x-label for="document_type" value="Tipo de documento" />

                <select id="document_type" name="document_type"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    required>
                    <option value="">Seleccione...</option>
                    <option value="CC">Cédula de ciudadanía</option>
                    <option value="TI">Tarjeta de identidad</option>
                    <option value="CE">Cédula de extranjería</option>
                    <option value="PA">Pasaporte</option>
                    <option value="RC">Registro civil</option>
                    <option value="PEP">Permiso especial de permanencia</option>
                    <option value="PPT">Permiso por Protección Temporal</option>
                </select>
            </div>

            {{-- DOCUMENTO --}}
            <div class="mt-4">
                <x-label for="document" value="Número de documento" />
                <x-input id="document" class="block mt-1 w-full" type="text"
                    name="document" :value="old('document')" required autocomplete="off" />
            </div>

            {{-- TELÉFONO --}}
            <div class="mt-4">
                <x-label for="phone" value="Teléfono" />

                <div class="flex">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-700 text-sm">
                        +57
                    </span>

                    <x-input id="phone" class="block w-full rounded-l-none" 
                        type="text" name="phone" 
                        :value="old('phone')" 
                        required autocomplete="tel" />
                </div>
            </div>
            {{-- DIRECCIÓN --}}
            <div class="mt-4">
                <x-label for="address" value="Dirección" />
                <x-input id="address" class="block mt-1 w-full" type="text"
                    name="address" :value="old('address')" required autocomplete="street-address" />
            </div>


            {{-- EMAIL --}}
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email"
                    name="email" :value="old('email')" required autocomplete="username" />
            </div>

            {{-- PASSWORD --}}
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="new-password" />
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- TERMS --}}
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">'
                                        . __('Terms of Service') . '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">'
                                        . __('Privacy Policy') . '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            {{-- SUBMIT --}}
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>
