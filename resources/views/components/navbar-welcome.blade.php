<nav id="navbottom" class="z-30 sticky w-full top-0 bg-white bg-opacity-90 backdrop-blur-sm shadow-md py-3 transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            
            <!-- Logo y Tagline - Lado izquierdo -->
            <a href="{{ route('welcome') }}" class="flex items-center space-x-3">
                <img id="logo" class="w-16" src="{{ asset('logos/Ruralmente_banco.png') }}" alt="Ruralmente">
                <div class="flex flex-col">
                    <span class="text-3xl font-bold text-gray-800 leading-snug tracking-tight">Ruralmente</span>
                    <span class="text-sm text-[#8B4513] font-handwriting mt-0.5">
                        Bienestar Psicosocial Rural
                    </span>
                </div>
            </a>


            <!-- Menú de navegación - Centro -->
            <ul class="hidden lg:flex items-center space-x-6">
                <li class="group relative">
                    <a href="{{ route('about') }}"
                       class="text-gray-700 hover:text-[#2E8B57] font-semibold py-2 px-4 rounded-lg transition-colors duration-300 text-sm">
                        Sobre Nosotros
                    </a>
                </li>

                <li class="group relative">
                    <a href="{{ route('ruralCafe') }}" 
                       class="text-gray-700 hover:text-[#2E8B57] font-semibold py-2 px-4 rounded-lg transition-colors duration-300 text-sm">
                        Servicios
                    </a>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-200">
                        <a class="block px-4 py-2 text-gray-700 hover:bg-[#2E8B57] hover:text-white transition-colors duration-200 text-sm" 
                           href="{{ route('agro') }}">Traje psicológico</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-[#2E8B57] hover:text-white transition-colors duration-200 text-sm" 
                           href="{{ route('workshop-course') }}">Paquetes</a>
                    </div>
                </li>

                <li class="group relative">
                    <a href="{{ route('tourism') }}" 
                       class="text-gray-700 hover:text-[#2E8B57] font-semibold py-2 px-4 rounded-lg transition-colors duration-300 text-sm">
                        Productos
                    </a>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-200">
                        <a class="block px-4 py-2 text-gray-700 hover:bg-[#2E8B57] hover:text-white transition-colors duration-200 text-sm" 
                           href="{{ route('agro') }}">Perchas</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-[#2E8B57] hover:text-white transition-colors duration-200 text-sm" 
                           href="{{ route('workshop-course') }}">Café campesinos felices</a>
                    </div>
                </li>
            </ul>

            <!-- Lado derecho - WhatsApp y Login -->
            <ul class="flex items-center space-x-4">
                <!-- WhatsApp -->
                <li>
                    <a id="whatsapp" href="https://wa.me/573008476257" target="_blank"
                        class="text-green-600 hover:text-white hover:bg-green-600 px-3 py-2 rounded-full transition-all duration-300 flex items-center space-x-2">
                            <i class="fa-brands fa-whatsapp fa-xl"></i>
                         <span class="hidden md:inline text-sm font-semibold">Contáctanos</span>
                    </a>

                </li>

                <!-- Login/Dashboard -->
                @if (Route::has('login'))
                    <li>
                        <div class="z-10 flex items-center">
                            @auth
                                <a href="{{ route('dashboard') }}" 
                                    class="bg-[#2E8B57] text-white px-4 py-2 rounded-lg font-semibold hover:bg-[#267349] transition-colors duration-300 text-sm shadow-sm">
                                        Dashboard
                                </a>

                            @else
                                @livewire('modal.modal-login', ['seeButton' => $seeButton])
                                @if($register)
                                    @livewire('modal.modal-register')
                                @endif
                            @endauth
                        </div>
                    </li>
                @endif
            </ul>

            <!-- Menú hamburguesa para móviles -->
            <button id="mobile-menu-toggle" class="lg:hidden text-gray-700 hover:text-[#2E8B57]">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu" class="lg:hidden hidden mt-4 bg-white rounded-lg shadow-lg border border-gray-200 p-4">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('about') }}" 
                   class="text-gray-700 hover:text-[#2E8B57] font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
                    Sobre Nosotros
                </a>

                <div class="border-l-2 border-[#2E8B57] pl-4 ml-2">
                    <a href="{{ route('ruralCafe') }}" 
                       class="text-gray-700 hover:text-[#2E8B57] font-semibold py-1 block transition-colors duration-300">
                        Servicios
                    </a>
                    <a href="{{ route('agro') }}" 
                       class="text-gray-600 hover:text-[#2E8B57] py-1 block text-sm transition-colors duration-300 ml-2">
                        • Traje psicológico
                    </a>
                    <a href="{{ route('workshop-course') }}" 
                       class="text-gray-600 hover:text-[#2E8B57] py-1 block text-sm transition-colors duration-300 ml-2">
                        • Paquetes
                    </a>
                </div>

                <div class="border-l-2 border-[#2E8B57] pl-4 ml-2">
                    <a href="{{ route('tourism') }}" 
                       class="text-gray-700 hover:text-[#2E8B57] font-semibold py-1 block transition-colors duration-300">
                        Productos
                    </a>
                    <a href="{{ route('agro') }}" 
                       class="text-gray-600 hover:text-[#2E8B57] py-1 block text-sm transition-colors duration-300 ml-2">
                        • Perchas
                    </a>
                    <a href="{{ route('workshop-course') }}" 
                       class="text-gray-600 hover:text-[#2E8B57] py-1 block text-sm transition-colors duration-300 ml-2">
                        • Café campesinos felices
                    </a>
                </div>

                <!-- WhatsApp móvil -->
                <a href="https://wa.me/573008476257" target="_blank"
                   class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold text-center hover:bg-green-700 transition-colors duration-300 mt-2">
                    <i class="fa-brands fa-whatsapp mr-2"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Tipografía manuscrita para el tagline */
    .font-handwriting {
        font-family: 'Brush Script MT', cursive, 'Segoe Script', sans-serif;
    }
</style>

<script>
    // Toggle del menú móvil
    document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Efecto de scroll mejorado
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbottom');
        const scrollY = window.scrollY;
        const scrollThreshold = 100;

        if (scrollY >= scrollThreshold) {
            nav.classList.add('shadow-lg', 'bg-white', 'bg-opacity-95', 'backdrop-blur-sm');
        } else {
            nav.classList.remove('shadow-lg', 'bg-opacity-95', 'backdrop-blur-sm');
        }
    });

    // Cerrar menú móvil al hacer clic en enlaces
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    });
</script>