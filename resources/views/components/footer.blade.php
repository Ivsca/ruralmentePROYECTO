<footer class="w-full bg-[#6F4E37] text-white py-12">
    <div class="container mx-auto px-4">
        <!-- Grid de tres columnas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <!-- Columna izquierda - Logo + Misión -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <!-- Logo -->
                <img 
                    src="{{ asset('logos/Ruralmente_banco.png') }}" 
                    alt="Ruralmente Logo" 
                    class="w-32 h-32 mb-4 object-contain"
                >
                <!-- Misión -->
                <p class="text-lg italic text-white opacity-90 leading-relaxed max-w-xs">
                    Transformando vidas rurales a través del bienestar y el café con propósito.
                </p>
            </div>

            <!-- Columna central - Contacto -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-xl font-bold mb-6 text-white">Contacto</h3>
                <div class="space-y-4">
                    <!-- Email -->
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-white opacity-80 mr-3 w-5"></i>
                        <a href="mailto:contacto@ruralmente.co" class="text-white opacity-90 hover:opacity-100 transition-opacity">
                            contacto@ruralmente.co
                        </a>
                    </div>
                    <!-- Teléfono -->
                    <div class="flex items-center">
                        <i class="fas fa-phone text-white opacity-80 mr-3 w-5"></i>
                        <a href="tel:+573108126547" class="text-white opacity-90 hover:opacity-100 transition-opacity">
                            +57 310 812 6547
                        </a>
                    </div>
                    <!-- Ubicación -->
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-white opacity-80 mr-3 w-5"></i>
                        <span class="text-white opacity-90">Bogotá, Colombia</span>
                    </div>
                </div>
            </div>

            <!-- Columna derecha - Nuestros Servicios -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-xl font-bold mb-6 text-white">Nuestros Servicios</h3>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-leaf text-white opacity-80 mr-3 w-5"></i>
                        <span class="text-white opacity-90">Programas de Resiliencia 360</span>
                    </li>
                     <li class="flex items-center">
                        <i class="fas fa-chart-line text-white opacity-80 mr-3 w-5"></i>

                        <a href="{{ route('ruralCafe') }}" 
                        class="text-white opacity-90 hover:opacity-100 hover:underline transition">
                            Cafés Campesinos Felices
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chart-line text-white opacity-80 mr-3 w-5"></i>

                        <a href="{{ route('news.view') }}" 
                        class="text-white opacity-90 hover:opacity-100 hover:underline transition">
                            Consultoría en Impacto Social
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Línea divisoria -->
        <div class="border-t border-white border-opacity-30 mt-8 pt-8 max-w-6xl mx-auto">
            <!-- Texto de derechos de autor -->
            <div class="text-center">
                <p class="text-white opacity-80 text-sm">
                    © 2023 Ruralmente. Todos los derechos reservados. 
                    <span class="inline-flex items-center">
                        Hecho con <i class="fas fa-heart text-red-400 mx-1"></i> para el campo colombiano.
                    </span>
                </p>
            </div>
        </div>
    </div>
</footer>