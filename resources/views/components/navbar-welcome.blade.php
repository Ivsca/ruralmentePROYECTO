<nav id="navbottom"
    class="z-30 sticky w-[100%] -mt-20 top-0 h-20 bg-gray-950 bg-opacity-50 text-gray-100 grid grid-cols-12 gap-4">
    <a href="{{route('welcome')}}" class="col-span-3 ">
        <img id="logo" class="w-20 mx-auto" src="{{ asset('logos/Ruralmente_banco.png') }}" alt="imagen">
    </a>
    <ul class="flex justify-around col-span-6 mt-2 align-middle " >

        <li class="pt-4 group">
            <a href="#"
                class="hover:text-[#99cf5a] font-body font-semibold py-3 px-8 rounded-lg text-xl cursor-pointer relative">
                Ruralmente

            </a>
            <div
                class="absolute items-center justify-start hidden w-1/3 p-4 mt-3 bg-black rounded-lg group-hover:flex bg-opacity-80">
                <a href="{{ route('about') }}"
                    class="p-2 text-lg font-semibold text-white hover:border hover:rounded-xl hover:text-white">Quienes
                    somos?</a>
                <a href="#"
                    class="p-2 text-lg font-semibold text-white hover:border hover:rounded-xl hover:text-white">Planes
                    Almácigo</a>
            </div>
        </li>
        <li class="pt-4">
            <a href="{{ route('ruralCafe') }}"
                class="hover:text-[#99cf5a] font-body font-semibold py-2 px-8 rounded-lg text-xl cursor-pointer">Ruralmente
                Café</a>
        </li>
        <li class="pt-4 group">
            <a href="{{ route('tourism') }}" class="hover:text-[#99cf5a] font-body font-semibold py-2 px-8 rounded-lg text-xl cursor-pointer">
                Ruralmente Turismo
            </a>
            <div class="absolute items-center justify-start hidden w-1/3 gap-2 p-4 mt-3 bg-black rounded-lg group-hover:flex bg-opacity-80">
                <a class="px-2 py-1 hover:border hover:rounded-xl text-white" href="{{route('agro')}}">Agroturismo</a>
                <a class="px-2 py-1 hover:border hover:rounded-xl text-white" href="{{route('workshop-course')}}">Talleres & curisos</a>
            </div>
        </li>
    </ul>
    <ul class="flex items-center justify-center col-span-3 gap-3 pt-3 text-center text-gray-100">
        <div>
            <a id="inst" class="w-56" href=""><i class="w-full fa-brands fa-instagram fa-2xl"></i></a>
        </div>
        @if (Route::has('login'))
            <div class="z-10 flex items-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="font-semibold text-white hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    @livewire('modal.modal-login', ['seeButton' => $seeButton])
                    @if($register)
                        @livewire('modal.modal-register')
                    @endif
                @endauth
            </div>
        @endif
    </ul>
</nav>
<script>
    // // Obtén una referencia al enlace
    const navbottom = document.getElementById("navbottom");
    const logo = document.getElementById("logo");
    const inst = document.getElementById("inst");
    const avatar = document.getElementById("avatar");

    // Agrega un evento para detectar el scroll
    window.addEventListener("scroll", () => {
        // Obtén la posición actual de desplazamiento vertical
        const scrollY = window.scrollY;

        // Define una posición de desplazamiento en la que quieres que cambie el color
        const scrollThreshold = 600; // Cambia esto según tus necesidades

        // Verifica si el desplazamiento ha alcanzado el umbral
        if (scrollY >= scrollThreshold) {
            // Agrega la clase "scroll" para cambiar el color
            navbottom.classList.add("scroll");
        } else {
            // Elimina la clase "scroll" para volver al color original
            navbottom.classList.remove("scroll");
        }
    });
</script>

