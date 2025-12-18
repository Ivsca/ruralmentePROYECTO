<footer class="w-full bg-[#6F4E37] text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                
                <img 
                    src="{{ asset('logos/Ruralmente_banco.png') }}" 
                    alt="Ruralmente Logo" 
                    class="w-32 h-32 mb-4 object-contain"
                >
               
                <p class="text-lg italic text-white opacity-90 leading-relaxed max-w-xs">
                    Transformando vidas rurales a través del bienestar y el café con propósito.
                </p>
            </div>

            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-xl font-bold mb-6 text-white">Redes Sociales</h3>
                <div class="space-y-4">
                    
                    <div class="flex items-center">
                        <i class="fab fa-instagram text-white opacity-80 mr-3 w-5"></i>
                        <a href="https://www.instagram.com/ruralmente.col/" class="text-white opacity-90 hover:opacity-100 transition-opacity">
                            Instagram
                        </a>
                    </div>
                    
                    <div class="flex items-center">
                        <i class="fab fa-spotify text-white opacity-80 mr-3 w-5"></i>
                        <a href="https://open.spotify.com/user/31zlmrth7wark4oykx5lb7b7v5i4?si=e558d470fe6144fd" class="text-white opacity-90 hover:opacity-100 transition-opacity">
                            Spotify
                        </a>
                    </div>
                   
                    <div class="flex items-center">
                        <i class="fab fa-youtube text-white opacity-80 mr-3 w-5"></i>
                        <a href="http://www.youtube.com/@ruralmentecolombia" class="text-white opacity-90 hover:opacity-100 transition-opacity">
                            Youtube
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-xl font-bold mb-6 text-white">Nuestros Servicios</h3>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-chart-line text-white opacity-80 mr-3 w-5"></i>
                        <a href="{{ route('triaje.create') }}" 
                        class="text-white opacity-90 hover:opacity-100 hover:underline transition">
                            Traje Psicológico
                        </a>
                    </li>
                     <li class="flex items-center">
                        <i class="fas fa-chart-line text-white opacity-80 mr-3 w-5"></i>

                        <a href="{{ route('mis-product') }}" 
                        class="text-white opacity-90 hover:opacity-100 hover:underline transition">
                            Productos Ruralmente
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chart-line text-white opacity-80 mr-3 w-5"></i>

                        <a href="{{ route('paquetes') }}" 
                        class="text-white opacity-90 hover:opacity-100 hover:underline transition">
                            Paquetes
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        
        <div class="border-t border-white border-opacity-30 mt-8 pt-8 max-w-6xl mx-auto">
            
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