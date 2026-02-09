<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 font-sans font-medium tracking-wide">
            {{ __('Olvidaste tu contraseña? No hay problema. Simplemente ingresa tu dirección de correo electrónico y te enviaremos un enlace de restablecimiento de contraseña que te permitirá elegir una nueva.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 font-sans font-medium tracking-wide">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4 font-sans font-medium tracking-wide" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full font-sans font-medium tracking-wide" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="font-sans font-medium tracking-wide">
                    {{ __('Enviar enlace de restablecimiento de contraseña') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
