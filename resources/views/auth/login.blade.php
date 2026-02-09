<x-guest-layout>

    <a href="{{ route('home') }}" class="btn-back-home font-sans font-medium tracking-wide">
        <i class="fa-solid fa-arrow-left"></i>
        Volver al inicio
    </a>

    <x-authentication-card>
        
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4 font-sans font-medium tracking-wide" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 font-sans font-medium tracking-wide">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full font-sans font-medium tracking-wide" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full font-sans font-medium tracking-wide" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600 font-sans font-medium tracking-wide">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-end mt-4 space-y-3 ">

                @if (Route::has('password.request'))
                    <a
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-button class="w-full justify-center">
                    {{ __('Iniciar sesión') }}
                </x-button>

                {{-- ENLACE PARA REGISTRARSE --}}
                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="w-full text-center underline text-sm text-indigo-600 hover:text-indigo-800 font-sans font-medium tracking-wide">
                        ¿No tienes cuenta? <span class="font-semibold">Registrarse</span>
                    </a>
                @endif

            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>
