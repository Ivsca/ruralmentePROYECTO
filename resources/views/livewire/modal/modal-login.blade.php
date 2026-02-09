<div>
    @if($seeButton == 1)
             <button wire:click="openModal" class="w-full px-3 py-1 m-2 duration-300 bg-gray-200 rounded shadow-md hover:scale-105 hover:bg-gray-200 bg-opacity-40 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-gray-300 focus:ring-opacity-50">Comprar</button>
    @elseif($seeButton == 2)
        <button wire:click="set('open', true)" class=""><img id="avatar" class="w-9" src="{{ asset('icon/blancos/avatar_blanco.png') }}" alt=""></button>
    @endif

    <x-dialog-modal wire:model="open">
        <x-slot name="title" >
            <div class="flex justify-end font-sans font-medium tracking-wide">
                <button wire:click="set('open', false)" class=""><i class="fa-solid fa-xmark"></i></button>
            </div>
        </x-slot>

        <x-slot name="content" >
            <x-authentication-card-logo />

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center w-full font-sans font-medium tracking-wide">
                    @csrf

                    <div class="w-4/5">
                        <x-label for="email" class="font-extrabold font-display" value="{{ __('Email') }}" />
                        <x-input id="email" class="block w-full mt-2 ml-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="w-4/5 mt-4">
                        <x-label for="password" class="font-extrabold font-display" value="{{ __('Password') }}" />
                        <x-input id="password" class="block w-full mt-2 ml-3" type="password" name="password" required autocomplete="current-password" />
                        @if (Route::has('password.request'))
                            <a class="text-sm text-[#179917] hover:text-gray-900 mt-2 flex items-start" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                    <div class="flex flex-col items-start mt-4 ">
                        
                        <div class="mt-5">
                            <x-button>
                                {{ __('Iniciar sesión') }}
                            </x-button>
                        </div>
                    </div>
                </form>
                <p class="text-black text-lg my-3">¿No tienes una cuenta? <button wire:click="openRegister" class="font-extrabold text-black" >Registrarse</button></p>
                
        </x-slot>

        <x-slot name="footer" >

        </x-slot>
    </x-dialog-modal>
</div>
