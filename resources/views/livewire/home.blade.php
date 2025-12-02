<div>
    <x-navbar-welcome :seeButton="2" :register="false" />
    <!-- Section Inicio -->
    <section class="relative w-full h-screen bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('fondos_imagenes_video/ai-generated-8593083_1280.jpg') }}');">

        
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/40 via-gray-700/20 to-transparent backdrop-blur-sm"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
                <img src="{{ asset('logos/Ruralmente_blanco.png') }}"alt="Ruralmente Logo"class="w-30 md:w-64 object-contain mx-auto mb-6">

                <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-tight leading-snug mb-4">
                    Bienestar Rural – Café con Propósito
                </h1>

                
                <p class="text-xl md:text-2xl italic mb-6 max-w-2xl">
                    Bienestar rural que transforma empresas y comunidades
                </p>
                
                <div class="text-lg md:text-xl mb-8 max-w-3xl leading-relaxed space-y-2">
                    <p>Brindamos servicios de bienestar y salud mental a: Mujeres campesinas, agricultores, ganaderos y caficultores. Mientras vendemos café premium producido por campesinos que priorizan su felicidad.</p>
                    <p></p>
                </div>

                
                <div class="flex flex-col sm:flex-row gap-3 mb-8">
                    <a href="{{ route('ruralServicios') }}" 
                    class="bg-[#2E8B57] hover:bg-[#267349] text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-leaf"></i> Conoce nuestros servicios
                    </a>
                    
                    <a href="{{ route('mis-product') }}" 
                    class="bg-[#2E8B57] hover:bg-[#267349] text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-mug-hot"></i> Prueba el Café de Campesinos Felices
                    </a>
                </div>

                
                <div class="flex flex-col sm:flex-row gap-8 text-center">
                    <div class="flex flex-col items-center bg-white/10 px-6 py-4 rounded-lg shadow-sm">
                        <span class="text-4xl font-bold text-white">500+</span>
                        <span class="text-lg text-white">Campesinos acompañados</span>
                    </div>
                    <div class="flex flex-col items-center bg-white/10 px-6 py-4 rounded-lg shadow-sm">
                        <span class="text-4xl font-bold text-white">15+</span>
                        <span class="text-lg text-white">Empresas aliadas</span>
                    </div>
                </div>

    </section>


    <!-- SECCIÓN 2: Dos formas de generar impacto real -->
    <section class="w-full py-16 bg-[#ECE8DD]">
        <div class="container mx-auto px-4">
            <!-- Título principal -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#35452B] mb-4">
                    Dos formas de generar impacto real
                </h2>
                <p class="text-xl text-gray-700 max-w-2xl mx-auto">
                    Conectamos empresas con comunidades rurales a través de bienestar y café con propósito
                </p>
            </div>

            <!-- Grid de dos columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                
                <!-- Columna Izquierda: Servicios de Bienestar B2B -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 transform hover:-translate-y-2">

                   
                   
                    <div class="mb-6">
                        <img 
                            src="{{ asset('fondos_imagenes_video/masaje.jpg') }}" 
                            alt="Café de Campesinos Felices" 
                            class="w-full h-48 object-cover rounded-lg shadow-md"
                        >
                    </div>

                    <div class=" mb-3">
                        <img 
                            src="{{ asset('icon/hoja.jpg') }}" 
                            alt="icono hoja"
                            class="w-14 h-14 object-contain"
                        >
                    </div>

                     <h3 class="text-2xl font-bold text-[#2E8B57] mb-4">
                        Servicios de Bienestar B2B
                    </h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Programas de salud mental y bienestar para comunidades agrícolas y pecuarias, financiados por empresas que buscan impacto social, mejora en productividad o fortalecimiento de sus cadenas de valor rurales.
                    </p>
                    
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <span class="text-[#2E8B57] mr-3 mt-1">✓</span>
                            <span class="text-gray-700">Talleres de salud mental y bienestar emocional</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#2E8B57] mr-3 mt-1">✓</span>
                            <span class="text-gray-700">Acompañamiento psicológico personalizado</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#2E8B57] mr-3 mt-1">✓</span>
                            <span class="text-gray-700">Programas de desarrollo comunitario sostenible</span>
                        </li>
                    </ul>
                </div>

                <!-- Columna Derecha: Café de Campesinos Felices -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 transform hover:-translate-y-2">
                    
                    
                    
                    <div class="mb-6">
                        <img 
                            src="{{ asset('fondos_imagenes_video/saco-de-arpillera-negro-de-cafe.jpg') }}" 
                            alt="Café de Campesinos Felices" 
                            class="w-full h-48 object-cover rounded-lg shadow-md"
                        >
                    </div>

                    <div class=" mb-3">
                        <img 
                            src="{{ asset('icon/taza.jpg') }}" 
                            alt="icono café"
                            class="w-14 h-14 object-contain"
                        >
                    </div>


                    <h3 class="text-2xl font-bold text-[#8B4513] mb-4">
                        Café de Campesinos Felices
                    </h3>
                    
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Café premium producido por caficultores que priorizan su salud mental y bienestar, vendido a empresas para consumo interno o regalos corporativos.
                    </p>
                    
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <span class="text-[#8B4513] mr-3 mt-1">✓</span>
                            <span class="text-gray-700">100% café colombiano de alta calidad</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#8B4513] mr-3 mt-1">✓</span>
                            <span class="text-gray-700">Cada compra apoya programas de bienestar rural</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#8B4513] mr-3 mt-1">✓</span>
                            <span class="text-gray-700">Ideal para consumo interno o regalos corporativos</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 3: Del bienestar, nace el mejor alimento -->
    <section class="w-full py-20 bg-white relative overflow-hidden">
        
        <div class="absolute right-0 top-0 w-1/3 h-full opacity-10 lg:opacity-20">
           
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Título principal -->
            <div class="text-center mb-16 max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-[#35452B] mb-6 leading-tight">
                    Del bienestar, nace el mejor alimento:<br>
                    <span class="text-[#8B4513]">transformación rural integral</span>
                </h2>
                
                <p class="text-xl text-gray-700 leading-relaxed">
                    Cada inversión en nuestros programas cuenta una historia de transformación. Cuando una empresa financia nuestros servicios de bienestar para agricultores, ganaderos y caficultores, o elige nuestro Café de Campesinos Felices, se convierte en parte de un movimiento que prioriza el bienestar integral del campo colombiano.
                </p>
            </div>

            <!-- Tres bloques de impacto -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-12">
                
                <!-- Bloque 1: Inversión con Propósito -->
                <div class="bg-gray-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-200">
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-[#2E8B57] rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-seedling text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#2E8B57]">Inversión con Propósito</h3>
                    </div>
                    <p class="text-gray-700 text-center">
                        Empresas eligen entre impacto social, fortalecimiento reputacional, o mejora en productividad de sus cadenas de valor rurales
                    </p>
                </div>

                <!-- Bloque 2: Bienestar Rural Integral -->
                <div class="bg-gray-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-200">
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-[#8B4513] rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#8B4513]">Bienestar Rural Integral</h3>
                    </div>
                    <p class="text-gray-700 text-center">
                        Trabajadores del campo agrícola y pecuario reciben apoyo en salud mental, desarrollo personal y fortalecimiento comunitario
                    </p>
                </div>

                <!-- Bloque 3: Resultados Tangibles -->
                <div class="bg-gray-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-200">
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-[#35452B] rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#35452B]">Resultados Tangibles</h3>
                    </div>
                    <p class="text-gray-700 text-center">
                        Las empresas obtienen reportes de impacto, mejoras en reputación, aumento en motivación de productores, o café premium para consumo interno
                    </p>
                </div>
            </div>

            <!-- Línea divisoria -->
            <div class="max-w-4xl mx-auto mb-12">
                <div class="border-t border-gray-300"></div>
            </div>

            <!-- Beneficios diferenciados -->
            <div class="max-w-4xl mx-auto text-center">
                <h3 class="text-2xl font-bold text-[#35452B] mb-8">
                    Beneficios diferenciados según tu objetivo empresarial:
                </h3>
                
                <div class="flex flex-col sm:flex-row justify-center gap-8">
                    <div class="bg-gradient-to-r from-[#2E8B57] to-[#3DA56A] text-white px-8 py-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                        <h4 class="text-xl font-bold mb-2">Para Grandes Empresas</h4>
                        <p class="text-sm opacity-90">Impacto social medible y fortalecimiento reputacional</p>
                    </div>
                    
                    <div class="bg-gradient-to-r from-[#8B4513] to-[#A0522D] text-white px-8 py-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                        <h4 class="text-xl font-bold mb-2">Para Cadenas de Valor</h4>
                        <p class="text-sm opacity-90">Mejora en productividad y sostenibilidad de proveedores</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NUEVA SECCIÓN 4: PERCHAS CAMPESINAS -->
    <section class="w-full py-20 relative overflow-hidden bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('fondos_imagenes_video/vector.jpg') }}');">
        <!-- Elementos decorativos sutiles -->
        <div class="absolute top-10 left-10 w-20 h-20 opacity-5">
            
        </div>
        <div class="absolute bottom-10 right-10 w-16 h-16 opacity-5">
            <i class="fas fa-hat-cowboy text-5xl text-[#2E8B57]"></i>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Título y subtítulo -->
            <div class="text-center mb-12 max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-[#8B4513] mb-6">
                    PERCHAS CAMPESINAS
                </h2>
                <p class="text-xl italic text-gray-700 leading-relaxed">
                    Lleva el espíritu del campo contigo, camisetas y gorras con diseños artesanales que apoyan el bienestar rural
                </p>
            </div>

            <!-- Grid de productos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-12">
                
                <!-- Producto 1: Camiseta ruralmente -->
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden">
                    <!-- Imagen del producto -->
                    <div class="h-64 bg-gray-200 flex items-center justify-center">
                        <img src="{{ asset('fondos_imagenes_video/Outfits.jpg') }}" alt="Camiseta Ruralmente" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#35452B] mb-2">Camiseta Verde Ruralmente</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            Camiseta de algodón con diseño artesanal del campo colombiano
                        </p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-[#8B4513]">$80.000</span>
                            <span class="text-sm text-gray-500">COP</span>
                        </div>
                        
                        <button class="w-full bg-[#2E8B57] hover:bg-[#267349] text-white py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>

                <!-- Producto 2: Cachucha ruralmente azul -->
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden">
                    <!-- Imagen del producto -->
                  <div class="h-64 bg-gray-200 flex items-center justify-center">
                        <img src="{{ asset('fondos_imagenes_video/Gorra Lisa De Malla Tucson Negro Invasion Caps.jpg') }}" alt="Camiseta Ruralmente" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#35452B] mb-2">Gorra Ruralmente Negra</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            Gorra de malla con diseño artesanal del campo colombiano
                        </p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-[#8B4513]">$66.000</span>
                            <span class="text-sm text-gray-500">COP</span>
                        </div>
                        
                        <button class="w-full bg-[#2E8B57] hover:bg-[#267349] text-white py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>

                <!-- Producto 3: Cachucha café campesinos -->
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden">
                    <!-- Imagen del producto -->
                    <div class="h-64 bg-gray-200 flex items-center justify-center">
                        
                        <img src="{{ asset('fondos_imagenes_video/ideas.jpg') }}" alt="Camiseta café Ruralmente" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#35452B] mb-2">Camiseta café Ruralmente</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            Camiseta de algodón con diseño artesanal del campo colombiano
                        </p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-[#8B4513]">$75.000</span>
                            <span class="text-sm text-gray-500">COP</span>
                        </div>
                        
                        <button class="w-full bg-[#2E8B57] hover:bg-[#267349] text-white py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Consultar disponibilidad
                        </button>
                    </div>
                </div>
            </div>

            <!-- Línea divisoria decorativa -->
            <div class="max-w-4xl mx-auto mb-8">
                <div class="border-t border-gray-300 relative">
                  
                </div>
            </div>

            <!-- Nota de impacto social -->
            <div class="text-center max-w-3xl mx-auto">

                <p class="text-lg italic text-gray-700 leading-relaxed mb-6">
                    <i class="fas fa-hands-helping text-[#2E8B57] mr-2"></i>
                    Cada compra apoya directamente a los programas de bienestar emocional para agricultores, ganaderos y caficultores en el campo colombiano
                </p>

                <!-- Botón Ver Perchas -->
                <a 
                    href="{{ route('productos.perchas') }}" 
                    class="inline-block px-6 py-3 bg-[#2E8B57] text-white text-lg rounded-xl shadow-md hover:bg-[#256f47] transition duration-300">
                    Ver perchas
                </a>

            </div>

        </div>
    </section>

    <div>
    <!-- ... (Todas las secciones anteriores se mantienen igual) ... -->

    <!-- SECCIÓN 5: CONTACTO -->
    <section class="w-full py-20 relative overflow-hidden bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('fondos_imagenes_video/fondo-degragado.jpg') }}');">
        <div class="container mx-auto px-4">
            <!-- Título principal -->
            <div class="text-center mb-16 max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-[#35452B] mb-6">
                    Genera impacto real. Únete a nuestra iniciativa.
                </h2>
            </div>

            <!-- Grid de tres columnas de contacto -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                
                <!-- Bloque 1: Para Empresas B2B -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-[#2E8B57] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-building text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#35452B] mb-4">Para Empresas B2B</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Si representas una empresa interesada en colaborar con proyectos rurales...
                    </p>
                    <div class="text-[#2E8B57] font-semibold">
                        contacto@ruralmentes.com
                    </div>
                </div>

                <!-- Bloque 2: Escríbenos -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-[#8B4513] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#35452B] mb-4">Escríbenos</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        ¿Tienes preguntas o quieres saber más?
                    </p>
                    <div class="text-[#8B4513] font-semibold">
                        contacto@ruralmentes.com
                    </div>
                </div>

                <!-- Bloque 3: Llámanos -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-[#35452B] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#35452B] mb-4">Llámanos</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Comunícate directamente con nuestro equipo.
                    </p>
                    <div class="text-[#35452B] font-semibold">
                        +57 300 847 6257
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 max-w-2xl mx-auto">
                <p class="text-lg text-gray-600 italic">
                    Estamos listos para ayudarte a crear un impacto positivo en las comunidades rurales colombianas.
                </p>
            </div>
        </div>
    </section>
    <x-footer />
</div>
