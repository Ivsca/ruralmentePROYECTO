<nav id="navbottom" class="z-30 sticky w-full top-0 bg-white shadow-md py-2 md:py-3 transition-all duration-300">
    <div class="container mx-auto px-3 sm:px-4">
        <div class="flex items-center justify-between">
            
            <!-- Logo y Tagline - Responsive -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2 sm:space-x-3 min-w-0 flex-shrink">
                <img id="logo" class="w-10 h-10 sm:w-12 sm:h-12 md:w-16 md:h-16 object-contain" 
                     src="{{ asset('logos/Ruralmente_banco.png') }}" alt="Ruralmente">
                <div class="flex flex-col min-w-0">
                    <span class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-gray-800 leading-tight tracking-tight truncate">
                        Ruralmente
                    </span>
                    <span class="text-xs sm:text-sm text-[#8B4513] font-handwriting mt-0.5 truncate">
                        Bienestar Psicosocial Rural
                    </span>
                </div>
            </a>

            <!-- Menú de navegación - Centro (Desktop) -->
            <ul class="hidden lg:flex items-center space-x-4 xl:space-x-6">
                <li class="group relative">
                    <a href="{{ route('about') }}"
                       class="text-gray-700 hover:text-emerald-600 font-semibold py-2 px-3 xl:px-4 rounded-lg transition-colors duration-300 text-sm xl:text-base whitespace-nowrap">
                        Sobre Nosotros
                    </a>
                </li>

                <li class="group relative">
                    <a href="{{ route('ruralServicios') }}" 
                       class="text-gray-700 hover:text-emerald-600 font-semibold py-2 px-3 xl:px-4 rounded-lg transition-colors duration-300 text-sm xl:text-base whitespace-nowrap">
                        Servicios
                    </a>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-200">
                        <a class="block px-4 py-2 text-gray-700 hover:bg-emerald-600 hover:text-white transition-colors duration-200 text-sm"
                            href="{{ route('triaje.create') }}"> Triaje psicológico
                        </a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-emerald-600 hover:text-white transition-colors duration-200 text-sm" 
                           href="{{ route('paquetes') }}">Paquetes</a>
                    </div>
                </li>
                <li class="group relative">
                    <a href="{{ route('mis-product') }}" 
                       class="text-gray-700 hover:text-emerald-600 font-semibold py-2 px-3 xl:px-4 rounded-lg transition-colors duration-300 text-sm xl:text-base whitespace-nowrap">
                        Productos
                    </a>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-200">
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a class="block px-4 py-2 text-gray-700 hover:bg-emerald-600 hover:text-white transition-colors duration-200 text-sm"
                                href="{{ route('admin.Tabla-productos') }}">
                                    Tabla de productos
                                </a>
                            @endif
                        @endauth
                    </div>
                </li>
            </ul>

            <!-- Lado derecho - WhatsApp y Login -->
            <div class="flex items-center space-x-2 sm:space-x-3 md:space-x-4">
                <!-- WhatsApp (Responsive) -->
                <a id="whatsapp" href="https://wa.me/573008476257" target="_blank"
                   class="text-emerald-600 hover:text-white hover:bg-emerald-600 p-2 sm:px-3 sm:py-2 rounded-full transition-all duration-300 flex items-center space-x-2"
                   aria-label="Contáctanos por WhatsApp">
                    <i class="fa-brands fa-whatsapp text-lg sm:text-xl"></i>
                    <span class="hidden md:inline text-sm font-semibold">Contáctanos</span>
                </a>

                <!-- Separador visual -->
                <div class="hidden sm:block h-6 w-px bg-gray-300"></div>

                <!-- Login/Dashboard (Responsive) -->
                @if (Route::has('login'))
                    <div class="z-10 flex items-center">
                        @auth
                            <a href="{{ route('dashboard') }}" 
                               class="bg-emerald-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg font-semibold hover:bg-emerald-700 transition-all duration-300 text-xs sm:text-sm shadow-sm whitespace-nowrap">
                                <span class="hidden sm:inline">Mi perfil</span>
                                <span class="sm:hidden"><i class="fas fa-user"></i></span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="bg-emerald-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg font-semibold hover:bg-emerald-700 transition-all duration-300 text-xs sm:text-sm shadow-sm whitespace-nowrap">
                                <span class="hidden sm:inline">Iniciar sesión</span>
                                <span class="sm:hidden"><i class="fas fa-sign-in-alt"></i></span>
                            </a>
                        @endauth
                    </div>
                @endif

                <!-- Menú hamburguesa para móviles -->
                <button id="mobile-menu-toggle" 
                        class="lg:hidden text-gray-700 hover:text-emerald-600 p-2 rounded-lg hover:bg-gray-100 transition-colors duration-300"
                        aria-label="Abrir menú de navegación">
                    <i class="fas fa-bars text-lg sm:text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Menú móvil mejorado -->
        <div id="mobile-menu" class="lg:hidden hidden mt-4 bg-white rounded-lg shadow-xl border border-gray-200 p-4 animate-fadeIn">
            <div class="flex flex-col space-y-2">
                <a href="{{ route('about') }}" 
                   class="text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 font-semibold py-2 px-4 rounded-lg transition-all duration-300 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-emerald-500"></i>
                    Sobre Nosotros
                </a>

                <!-- Servicios móvil -->
                <div class="relative">
                    <a href="{{ route('ruralServicios') }}" 
                       class="text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 font-semibold py-2 px-4 rounded-lg transition-all duration-300 flex items-center justify-between">
                        <span class="flex items-center">
                            <i class="fas fa-hands-helping mr-3 text-emerald-500"></i>
                            Servicios
                        </span>
                        <i class="fas fa-chevron-down text-sm text-gray-400"></i>
                    </a>
                    <div class="pl-8 mt-1 space-y-1">
                        <a href="{{ route('triaje.store') }}" 
                           class="text-gray-600 hover:text-emerald-600 py-1.5 block text-sm transition-colors duration-300 flex items-center">
                            <i class="fas fa-circle text-xs mr-2 text-emerald-400"></i>
                            Triaje psicológico
                        </a>
                        <a href="{{ route('paquetes') }}" 
                           class="text-gray-600 hover:text-emerald-600 py-1.5 block text-sm transition-colors duration-300 flex items-center">
                            <i class="fas fa-circle text-xs mr-2 text-emerald-400"></i>
                            Paquetes
                        </a>
                    </div>
                </div>

                <!-- Productos móvil -->
                <div class="relative">
                    <a href="#" 
                       class="text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 font-semibold py-2 px-4 rounded-lg transition-all duration-300 flex items-center justify-between">
                        <span class="flex items-center">
                            <i class="fas fa-shopping-bag mr-3 text-emerald-500"></i>
                            Productos
                        </span>
                        <i class="fas fa-chevron-down text-sm text-gray-400"></i>
                    </a>
                    <div class="pl-8 mt-1 space-y-1">
                        <a href="{{ route('productos.perchas') }}" 
                           class="text-gray-600 hover:text-emerald-600 py-1.5 block text-sm transition-colors duration-300 flex items-center">
                            <i class="fas fa-circle text-xs mr-2 text-emerald-400"></i>
                            Perchas
                        </a>
                        <a href="{{ route('mis-product') }}" 
                           class="text-gray-600 hover:text-emerald-600 py-1.5 block text-sm transition-colors duration-300 flex items-center">
                            <i class="fas fa-circle text-xs mr-2 text-emerald-400"></i>
                            Lista de productos
                        </a>
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.Tabla-productos') }}" 
                                   class="text-gray-600 hover:text-emerald-600 py-1.5 block text-sm transition-colors duration-300 flex items-center">
                                    <i class="fas fa-circle text-xs mr-2 text-emerald-400"></i>
                                    Tabla de productos
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- WhatsApp móvil -->
                <a href="https://wa.me/573008476257" target="_blank"
                   class="bg-emerald-600 text-white px-4 py-2.5 rounded-lg font-semibold text-center hover:bg-emerald-700 transition-all duration-300 mt-2 flex items-center justify-center">
                    <i class="fa-brands fa-whatsapp mr-2 text-lg"></i>
                    Contáctanos por WhatsApp
                </a>

                <!-- Usuario móvil -->
                <div class="pt-3 border-t border-gray-200">
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 font-semibold py-2 px-4 rounded-lg transition-all duration-300 flex items-center">
                            <i class="fas fa-user-circle mr-3 text-emerald-500"></i>
                            Mi perfil
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 font-semibold py-2 px-4 rounded-lg transition-all duration-300 flex items-center">
                            <i class="fas fa-sign-in-alt mr-3 text-emerald-500"></i>
                            Iniciar sesión
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Tipografía manuscrita para el tagline */
    .font-handwriting {
        font-family: 'Brush Script MT', cursive, 'Segoe Script', sans-serif;
    }
    
    /* Animación para menú móvil */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }
    
    /* Mejorar scroll suave */
    html {
        scroll-behavior: smooth;
    }
    
    /* Ajustes responsivos específicos */
    @media (max-width: 640px) {
        #navbottom .container {
            padding-left: 12px;
            padding-right: 12px;
        }
    }
    
    @media (min-width: 1024px) and (max-width: 1280px) {
        /* Ajustes para laptops pequeños */
        #navbottom ul li a {
            padding-left: 12px;
            padding-right: 12px;
        }
    }
</style>

<script>
    // Toggle del menú móvil mejorado
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            // Cambiar icono según estado
            const icon = this.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        });
    }

    // Efecto de scroll mejorado con throttle
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbottom');
        
        // Limitar la frecuencia de ejecución
        if (scrollTimeout) {
            window.cancelAnimationFrame(scrollTimeout);
        }
        
        scrollTimeout = window.requestAnimationFrame(() => {
            const scrollY = window.scrollY;
            const scrollThreshold = 50;
            
            if (scrollY >= scrollThreshold) {
                nav.classList.add('shadow-lg', 'bg-white', 'bg-opacity-95', 'backdrop-blur-sm', 'py-1');
                nav.classList.remove('py-2', 'md:py-3');
            } else {
                nav.classList.remove('shadow-lg', 'bg-opacity-95', 'backdrop-blur-sm', 'py-1');
                nav.classList.add('py-2', 'md:py-3');
            }
        });
    }, { passive: true });

    // Cerrar menú móvil al hacer clic en enlaces
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            // Restaurar icono de hamburguesa
            const icon = mobileMenuToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        });
    });

    // Cerrar menú móvil al hacer clic fuera
    document.addEventListener('click', (event) => {
        if (!mobileMenu.classList.contains('hidden') && 
            !mobileMenu.contains(event.target) && 
            !mobileMenuToggle.contains(event.target)) {
            mobileMenu.classList.add('hidden');
            // Restaurar icono de hamburguesa
            const icon = mobileMenuToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    // Mejorar accesibilidad del menú móvil
    mobileMenuToggle.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            mobileMenuToggle.click();
        }
    });

    // Focus trap para menú móvil (accesibilidad)
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            mobileMenuToggle.focus();
            // Restaurar icono de hamburguesa
            const icon = mobileMenuToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    // Optimizar para dispositivos táctiles
    let touchStartY = 0;
    let touchEndY = 0;
    
    document.addEventListener('touchstart', (event) => {
        touchStartY = event.changedTouches[0].screenY;
    }, { passive: true });
    
    document.addEventListener('touchend', (event) => {
        touchEndY = event.changedTouches[0].screenY;
        // Cerrar menú al deslizar hacia abajo
        if (!mobileMenu.classList.contains('hidden') && touchEndY > touchStartY + 50) {
            mobileMenu.classList.add('hidden');
            const icon = mobileMenuToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    }, { passive: true });
</script>