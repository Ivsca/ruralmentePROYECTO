<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false"/>

    <main class="w-full">
        <!-- Hero Section Mejorado -->
        <section class="w-full py-28 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden">
            <!-- Elementos decorativos de fondo -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-green-100/20 via-transparent to-transparent"></div>
            <div class="absolute top-10 right-10 w-32 h-32 bg-green-200/30 rounded-full blur-2xl"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 bg-teal-200/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center">
                    <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6 bg-gradient-to-r from-green-800 via-emerald-700 to-teal-800 bg-clip-text text-transparent">
                        Soluciones integrales de bienestar
                    </h1>
                    <p class="text-xl leading-relaxed text-gray-700 font-medium">
                        Servicios especializados diseñados para mejorar la salud mental y el bienestar psicosocial de las comunidades campesinas.
                    </p>
                </div>
            </div>
        </section>

        <!-- Sección de Servicios de Salud Mental -->
        <section class="w-full py-20 bg-gradient-to-b from-white to-gray-50/80">
            <div class="container mx-auto px-6 md:px-12 lg:px-16 max-w-7xl">
                <h2 class="sr-only">Servicios de Salud Mental de Ruralmente</h2>
                
                <!-- Grid de servicios mejorado -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
                    
                    <!-- Tarjeta 1: Diagnóstico de entrada y salida -->
                    <div class="group bg-white rounded-2xl border border-emerald-100 shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-500 to-emerald-400"></div>
                        <div class="absolute -right-10 -top-10 w-20 h-20 bg-green-100/30 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Diagnóstico de Entrada y Salida</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed flex-grow relative z-10">
                            Valoración psicológica inicial y de cierre para evaluar el impacto de la intervención.
                        </p>
                        <ul class="space-y-3 relative z-10">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Diagnóstico psicológico inicial</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Diagnóstico psicológico de cierre</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Medición de impacto final</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Reportes detallados</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Las otras 3 tarjetas seguirían el mismo patrón de diseño mejorado -->
                    <!-- Tarjeta 2: Teleatención en salud mental -->
                    <div class="group bg-white rounded-2xl border border-blue-100 shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
                        <div class="absolute -right-10 -top-10 w-20 h-20 bg-blue-100/30 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Teleatención en Salud Mental</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed flex-grow relative z-10">
                            Atención psicológica individual mediante telemedicina desde cualquier ubicación.
                        </p>
                        <ul class="space-y-3 relative z-10">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Consultas uno a uno</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Plataforma segura de telemedicina</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Psicólogos especializados</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Horarios flexibles</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Seguimiento continuo</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Tarjeta 3: Talleres psicoeducativos -->
                    <div class="group bg-white rounded-2xl border border-amber-100 shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 to-yellow-400"></div>
                        <div class="absolute -right-10 -top-10 w-20 h-20 bg-amber-100/30 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Talleres Psicoeducativos en Comunidad</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed flex-grow relative z-10">
                            Visitas presenciales a comunidades campesinas para fortalecer habilidades emocionales y psicosociales.
                        </p>
                        <ul class="space-y-3 relative z-10">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Talleres presenciales</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Enfóque comunitario</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Metodología participativa</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Materiales adaptados culturalmente</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Facilitadores especializados</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Tarjeta 4: Desarrollo comunitario -->
                    <div class="group bg-white rounded-2xl border border-purple-100 shadow-lg p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-indigo-400"></div>
                        <div class="absolute -right-10 -top-10 w-20 h-20 bg-purple-100/30 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-4 relative z-10">Talleres de Desarrollo Comunitario</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed flex-grow relative z-10">
                            Programas diseñados para fortalecer el capital social, la organización comunitaria y el desarrollo sostenible.
                        </p>
                        <ul class="space-y-3 relative z-10">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Diagnóstico psicológico inicial</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Fortalecimiento organizacional</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Desarrollo de liderazgo</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Gestión comunitaria</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Proyectos sostenibles</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-0.5 mr-3">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-800 font-medium">Acompañamiento continuo</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Unificada: Recursos Psicoeducativos Mejorada -->
        <section class="w-full bg-gradient-to-br from-slate-50 via-white to-blue-50/30 relative overflow-hidden">
            <!-- Elementos decorativos -->
            <div class="absolute top-0 left-0 w-72 h-72 bg-green-200/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-200/10 rounded-full translate-x-1/3 translate-y-1/3"></div>
            
            <!-- Hero dentro de la misma sección -->
            <div class="w-full py-24 relative z-10">
                <div class="container mx-auto px-4">
                    <header class="max-w-4xl mx-auto text-center">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold tracking-tight mb-6">
                            <span class="bg-gradient-to-r from-green-800 via-emerald-700 to-teal-700 bg-clip-text text-transparent">
                                Recursos para el bienestar integral
                            </span>
                        </h1>
                        <p class="text-xl md:text-2xl leading-relaxed text-gray-700 font-light">
                            Herramientas innovadoras diseñadas para promover el autocuidado y el bienestar emocional en comunidades.
                        </p>
                    </header>
                </div>
            </div>

            <!-- Contenido de tarjetas mejorado -->
            <div class="container mx-auto px-6 lg:px-12 pb-24 max-w-7xl relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <!-- Tarjeta Izquierda - Tarjetas Psicoeducativas -->
                <article class="group bg-white/80 backdrop-blur-sm rounded-3xl border border-green-100 shadow-2xl p-8 transition-all duration-500 hover:shadow-3xl hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-50/50 to-emerald-100/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-green-100 to-emerald-100 border border-green-200 mb-6 shadow-sm">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                        <span class="text-sm font-semibold text-green-800">Destacado</span>
                    </div>
                    
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6 relative z-10">Tarjetas Psicoeducativas</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6 relative z-10">
                        Material didáctico visual diseñado para enseñar sobre salud mental de manera asequible y comprensible.
                    </p>
                    
                    <div class="mt-6 p-6 bg-white/60 rounded-2xl border border-green-200/50 backdrop-blur-sm shadow-sm relative z-10">
                        <p class="text-gray-700 text-base leading-relaxed font-medium mb-4">
                            <span class="text-green-700">Temas incluidos:</span>
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-green-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700"><strong>Estrés:</strong> Identificación, causas y estrategias de manejo.</span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-green-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700"><strong>Ansiedad:</strong> Reconocimiento de síntomas y técnicas de control.</span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-green-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700"><strong>Depresión:</strong> Señales de alerta y recursos de apoyo.</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 relative z-10">
                        <a href="{{ route('cotizacion') }}"
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 
                                text-white font-semibold py-4 px-8 rounded-2xl transition-all duration-300 
                                flex items-center justify-center gap-3 shadow-lg hover:shadow-xl hover:scale-105 group">

                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>

                            <span class="text-lg">Realizar cotización</span>
                        </a>

                    </div>
                </article>
                
                <!-- Tarjeta Derecha - Remedios Benditos -->
                <article class="group bg-white/80 backdrop-blur-sm rounded-3xl border border-amber-100 shadow-2xl p-8 transition-all duration-500 hover:shadow-3xl hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-50/50 to-yellow-100/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-amber-100 to-yellow-100 border border-amber-200 mb-6 shadow-sm">
                        <div class="w-2 h-2 bg-amber-500 rounded-full mr-2"></div>
                        <span class="text-sm font-semibold text-amber-800">Innovador</span>
                    </div>
                    
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6 relative z-10">Remedios Benditos</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6 relative z-10">
                        Audios personalizados enviados individualmente a cada participante con estrategias prácticas de manejo emocional y psicosocial.
                    </p>
                    
                    <div class="mt-6 p-6 bg-white/60 rounded-2xl border border-amber-200/50 backdrop-blur-sm shadow-sm relative z-10">
                        <p class="text-gray-700 text-base leading-relaxed font-medium mb-4">
                            <span class="text-amber-700">Áreas de Trabajo:</span>
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700 text-sm"><strong>Emocional</strong></span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700 text-sm"><strong>Social</strong></span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700 text-sm"><strong>Psicosocial</strong></span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700 text-sm"><strong>Mental</strong></span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700 text-sm"><strong>Cognitivo</strong></span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                                <span class="text-gray-700 text-sm"><strong>Conductual</strong></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 relative z-10">
                        <button class="w-full bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-semibold py-4 px-8 rounded-2xl transition-all duration-300 flex items-center justify-center gap-3 shadow-lg hover:shadow-xl hover:scale-105 group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-2-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                            </svg>
                            <span class="text-lg">Escuchar en Spotify</span>
                        </button>
                    </div>
                </article>
                </div>
            </div>
        </section>

        <!-- Pop-up flotante mejorado -->
        <div id="unpin-popup" class="fixed top-6 right-6 bg-gradient-to-r from-gray-900 to-slate-800 text-white px-6 py-4 rounded-2xl shadow-2xl z-50 transition-all duration-500 border border-gray-700 backdrop-blur-sm">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-gray-100">Unpin Ruralmente Colombia's presentation from your main screen.</span>
                <button onclick="closePopup()" class="ml-4 text-gray-400 hover:text-white transition-colors duration-300 hover:scale-110" aria-label="Cerrar notificación">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <script>
            // Auto-cerrar el popup después de 5 segundos
            setTimeout(() => {
                const popup = document.getElementById('unpin-popup');
                if (popup) {
                    popup.style.opacity = '0';
                    popup.style.transform = 'translateX(100%)';
                    setTimeout(() => popup.remove(), 500);
                }
            }, 5000);

            // Función para cerrar manualmente
            function closePopup() {
                const popup = document.getElementById('unpin-popup');
                if (!popup) return;
                popup.style.opacity = '0';
                popup.style.transform = 'translateX(100%)';
                setTimeout(() => popup.remove(), 500);
            }
        </script>
    </main>

    <x-footer />
</x-guest-layout>