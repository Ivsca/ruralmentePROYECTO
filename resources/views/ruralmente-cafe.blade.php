<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false"/>

    <main class="w-full">
        <!-- Hero Section Mejorado -->
        <section class="w-full py-28 bg-cover bg-center bg-no-repeat relative">
            <div class="relative z-10 container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center text-black">
                    <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6">Soluciones integrales de bienestar</h1>
                    <p class="text-xl leading-relaxed text-black/90">
                        Servicios especializados diseñados para mejorar la salud mental y el bienestar psicosocial de las comunidades campesinas.
                    </p>
                </div>
            </div>
        </section>

        <!-- Sección de Servicios de Salud Mental -->
        <section class="w-full py-16 bg-gray-50">
            <div class="container mx-auto px-6 md:px-12 lg:px-16 max-w-7xl">
                <!-- Título de sección (oculto visualmente pero presente para accesibilidad) -->
                <h2 class="sr-only">Servicios de Salud Mental de Ruralmente</h2>
                
                <!-- Grid de servicios - Modificado para 4 tarjetas -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 md:gap-8">
                    
                    <!-- Tarjeta 1: Diagnóstico de entrada y salida -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Diagnóstico de Entrada y Salida</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed flex-grow">
                            Valoración psicológica inicial y de cierre para evaluar el impacto de la intervención.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Diagnóstico psicológico inicial</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Diagnóstico psicológico de cierre</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Medición de impacto final</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Reportes detallados</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Tarjeta 2: Teleatención en salud mental -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Teleatención en Salud Mental</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed flex-grow">
                            Atención psicológica individual mediante telemedicina desde cualquier ubicación.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Consultas uno a uno</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Plataforma segura de telemedicina</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Psicólogos especializados</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Horarios flexibles</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Seguimiento continuo</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Tarjeta 3: Talleres psicoeducativos en comunidad -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Talleres Psicoeducativos en Comunidad</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed flex-grow">
                            Visitas presenciales a comunidades campesinas para fortalecer habilidades emocionales y psicosociales.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Talleres presenciales</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Enfoque comunitario</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Metodología participativa</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Materiales adaptados culturalmente</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Facilitadores especializados</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Tarjeta 4: Talleres de desarrollo comunitario -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Talleres de Desarrollo Comunitario</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed flex-grow">
                            Programas diseñados para fortalecer el capital social, la organización comunitaria y el desarrollo sostenible.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Fortalecimiento organizacional</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Liderazgo comunitario</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Gestión comunitaria</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Proyectos sostenibles</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-800 font-medium">Acompañamiento continuo</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

         <!-- Sección Unificada: Recursos Psicoeducativos -->
        <section class="w-full bg-gray-50 relative">
        <!-- Hero dentro de la misma sección -->
        <div class="w-full py-28 bg-cover bg-center bg-no-repeat">
            <div class="relative z-10 container mx-auto px-4">
            <header class="max-w-2xl mx-auto text-center text-black">
                <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6">
                Recursos para el bienestar integral
                </h1>
                <p class="text-xl leading-relaxed text-black/90">
                Herramientas innovadoras diseñadas para promover el autocuidado y el bienestar emocional en comunidades.
                </p>
            </header>
            </div>
        </div>

        <!-- Contenido de tarjetas -->
        <div class="container mx-auto px-12 lg:px-16 pb-20 max-w-7xl">
            <!-- Grid de 2 columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            
            <!-- Tarjeta Izquierda - Tarjetas Psicoeducativas -->
            <article class="bg-white rounded-xl border border-gray-200 shadow-sm p-7 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 border border-blue-100 mb-4">
                <span class="text-sm font-medium text-blue-700">Destacado</span>
                </div>
                
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Tarjetas Psicoeducativas</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                Material didáctico visual diseñado para enseñar sobre salud mental de manera asequible y comprensible.
                </p>
                
                <div class="mt-4 p-4 bg-gray-50 rounded-lg border border-gray-100">
                <p class="text-gray-700 text-sm leading-relaxed">
                    <strong>Temas incluidos:</strong>
                </p>
                <p class="text-gray-700 text-sm leading-relaxed">
                    <strong>Estrés:</strong> Identificación, causas y estrategias de manejo.
                </p>
                <p class="text-gray-700 text-sm leading-relaxed">
                    <strong>Ansiedad:</strong> Reconocimiento de sintomas y técnicas de control.
                </p>
                <p class="text-gray-700 text-sm leading-relaxed">
                    <strong>Depresión:</strong> Señales de alerta y recursos de apoyo.
                </p>
                </div>
                
                <div class="mt-6 flex justify-end" aria-hidden="true">
                <svg class="w-12 h-12 text-blue-500 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                </svg>
                </div>
            </article>
            
            <!-- Tarjeta Derecha - Remedios Benditos -->
            <article class="bg-white rounded-xl border border-gray-200 shadow-sm p-7 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <!-- Badge Innovador -->
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-amber-50 border border-amber-100 mb-4">
                <span class="text-sm font-medium text-amber-700">Innovador</span>
                </div>
                
                <!-- Título -->
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Remedios Benditos</h3>
                
                <!-- Descripción principal -->
                <p class="text-gray-600 leading-relaxed mb-4">
                Audios personalizados enviados individualmente a cada participante con estrategias prácticas de manejo emocional y psicosocial.
                </p>
                
                <!-- Texto adicional -->
                <div class="mt-4 p-4 bg-gray-50 rounded-lg border border-gray-100">
                <p class="text-gray-700 text-sm leading-relaxed">
                    <strong>Áreas de Trabajo:</strong> Emocional: Regulación emocional y autoconocimiento.
                </p>
                </div>
                
                <!-- Icono decorativo -->
                <div class="mt-6 flex justify-end" aria-hidden="true">
                <svg class="w-12 h-12 text-amber-500 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z"/>
                </svg>
                </div>
            </article>
            </div>
        </div>
        </section>

        <!-- Pop-up flotante (Unpin) -->
        <div id="unpin-popup" class="fixed top-4 right-4 bg-gray-900 text-white px-4 py-3 rounded-xl shadow-lg z-50 transition-all duration-300">
        <div class="flex items-center justify-between">
            <span class="text-sm font-medium">Unpin Ruralmente Colombia's presentation from your main screen.</span>
            <button onclick="closePopup()" class="ml-3 text-gray-300 hover:text-white transition-colors" aria-label="Cerrar notificación">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            </button>
        </div>
        </div>

        <script>
        // Auto-cerrar el popup después de 4 segundos
        setTimeout(() => {
            const popup = document.getElementById('unpin-popup');
            if (popup) {
            popup.style.opacity = '0';
            setTimeout(() => popup.remove(), 300);
            }
        }, 4000);

        // Función para cerrar manualmente
        function closePopup() {
            const popup = document.getElementById('unpin-popup');
            if (!popup) return;
            popup.style.opacity = '0';
            setTimeout(() => popup.remove(), 300);
        }
        </script>

        
    </main>

    <x-footer />
</x-guest-layout>