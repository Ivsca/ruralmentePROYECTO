<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register=false />

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
                        Soluciones a medida para su empresa
                    </h1>
                    <p class="text-xl leading-relaxed text-gray-700 font-medium">
                        Paquetes integrales diseñados para maximizar el impacto en el bienestar de las comunidades campesinas.
                    </p>
                </div>
            </div>
        </section>

        <section class="w-full py-24 bg-gray-50">
            <div class="container mx-auto px-6 lg:px-12 max-w-7xl">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                
                <!-- Paquete Básico -->
                <article class="bg-white rounded-xl border border-gray-200 shadow-sm p-7 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paquete Básico</h3>
                    <ul class="space-y-2">
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Diagnóstico de entrada y salida
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> 4 consultas psicológicas individuales
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> 2 talleres psicoeducativos grupales
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Tarjetas psicoeducativas (set básico)
                    </li>
                    <li class="flex items-start gap-2 text-gray-400 text-sm leading-relaxed">
                        <span class="text-red-400 font-bold">✗</span> 
                        <span class="line-through">Talleres de desarrollo comunitario</span>
                    </li>
                    <li class="flex items-start gap-2 text-gray-400 text-sm leading-relaxed">
                        <span class="text-red-400 font-bold">✗</span> 
                        <span class="line-through">Remedios benditos personalizados</span>
                    </li>
                </ul>
                <!-- Sección de información del paquete - Colocar después de la lista -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                            <!-- Ideal para -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Ideal para</h4>
                                <p class="text-sm text-gray-600">Empresas que inician programas de bienestar</p>
                            </div>

                            <!-- Duración -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Duración</h4>
                                <p class="text-sm text-gray-600">3 meses</p>
                            </div>

                            <!-- Cobertura -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Cobertura</h4>
                                <p class="text-sm text-gray-600">Hasta 50 participantes</p>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Paquete Integral -->
                <article class="bg-white rounded-xl border border-gray-200 shadow-sm p-7 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 border border-emerald-100 mb-4">
                    <span class="text-sm font-medium text-emerald-700">Más Popular</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paquete Integral</h3>
                    <ul class="space-y-2">
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Diagnóstico de entrada y salida completo
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> 8 consultas psicológicas individuales
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> 6 talleres psicoeducativos
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> 4 talleres de desarrollo comunitario
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Tarjetas psicoeducativas (set completo)
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Remedios benditos personalizados
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Reporte de impacto y resultados
                    </li>
                    </ul>

                    <!-- Sección de información del paquete - Colocar después de la lista -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                            <!-- Ideal para -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Ideal para</h4>
                                <p class="text-sm text-gray-600">pendiente</p>
                            </div>

                            <!-- Duración -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Duración</h4>
                                <p class="text-sm text-gray-600">pendiente</p>
                            </div>

                            <!-- Cobertura -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Cobertura</h4>
                                <p class="text-sm text-gray-600">Hasta 150 participantes</p>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Paquete Premium -->
                <article class="bg-white rounded-xl border border-gray-200 shadow-sm p-7 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paquete Premium</h3>
                    <p class="text-base font-medium text-gray-500 mb-4">Consultar</p>
                    <ul class="space-y-2">
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Diagnóstico de entrada y salida avanzado
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> 8 consultas psicológicas individuales
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Ilimitados talleres psicoeducativos
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Talleres de desarrollo comunitario continuos
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Tarjetas psicoeducativas (set completo + actualizaciones)
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Remedios benditos personalizados mensuales
                    </li>
                    <li class="flex items-start gap-2 text-gray-700 text-sm leading-relaxed">
                        <span class="text-green-500 font-bold">✓</span> Promotores comunitarios formados
                    </li>
                    </ul>

                    <!-- Sección de información del paquete - Colocar después de la lista -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                            <!-- Ideal para -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Ideal para</h4>
                                <p class="text-sm text-gray-600">Grandes corporaciones con compromiso social</p>
                            </div>

                            <!-- Duración -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Duración</h4>
                                <p class="text-sm text-gray-600">12 meses (renovable)</p>
                            </div>

                            <!-- Cobertura -->
                            <div class="flex flex-col items-center md:items-start">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-1">Cobertura</h4>
                                <p class="text-sm text-gray-600">Ilimitada</p>
                            </div>
                        </div>
                    </div>
                </article>
                </div>

                <!-- Botón final -->
                <div class="mt-12 text-center">
                <a href="{{ route('cotizacion') }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-3 rounded-lg shadow transition-all duration-300">
                    Solicitar cotización
                </a>
                </div>
            </div>
            </section>

            <section class="w-full bg-emerald-600 py-20">
                <div class="container mx-auto px-6 lg:px-12 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    ¿Necesita un paquete personalizado?
                    </h2>
                    <p class="text-base md:text-lg text-white/90 leading-relaxed max-w-2xl mx-auto">
                    Diseñamos soluciones a medida según las necesidades de tu empresa y las comunidades que desea impactar.
                    </p>
                    <a href="{{ route('cotizacion') }}" class="inline-block mt-6 bg-white text-emerald-700 hover:bg-gray-100 font-semibold text-sm px-6 py-3 rounded-lg shadow transition-all duration-300">
                    Solicitar Propuesta Personalizada
                    </a>
                </div>
            </section>


    </main>
    <x-footer/>
</x-guest-layout>
