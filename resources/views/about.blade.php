<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false"/>

    <main class="w-full">
        <!-- Hero Section Mejorado -->
        <section class="w-full py-28 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-green-100/20 via-transparent to-transparent"></div>
            <div class="absolute top-10 right-10 w-32 h-32 bg-green-200/30 rounded-full blur-2xl"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 bg-teal-200/20 rounded-full blur-3xl"></div>

            <div class="relative z-10 container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center">
                    <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6 bg-gradient-to-r from-green-800 via-emerald-700 to-teal-800 bg-clip-text text-transparent">¿Quiénes Somos?</h1>
                    <p class="text-xl leading-relaxed text-gray-700 font-medium">
                        <strong>Ruralmente</strong> impulsa el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y tecnología avanzada.
                    </p>
                </div>
            </div>
        </section>

        <!-- Sección Misión, Visión, Valores mejorada -->
        <section class="w-full py-20 bg-gradient-to-b from-white to-gray-50">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">

                    <!-- ¿Quiénes Somos? -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-emerald-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col items-center text-center mb-4">
                            <div class="bg-emerald-100 p-4 rounded-full mb-4">
                                <i class="fas fa-seedling text-emerald-600 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">¿Quiénes Somos?</h3>
                        </div>
                        <p class="text-gray-600 leading-relaxed">
                            Ruralmente impulsa el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y tecnología avanzada, mejorando productividad, relaciones y bienestar.
                        </p>
                    </div>

                    <!-- Misión -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-amber-600 hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col items-center text-center mb-4">
                            <div class="bg-amber-100 p-4 rounded-full mb-4">
                                <i class="fas fa-brain text-amber-600 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Misión</h3>
                        </div>
                        <p class="text-gray-600 leading-relaxed">
                            Nuestra misión es más que palabras: es un compromiso emocional. Visualizamos un agro donde la salud mental es prioridad.
                        </p>
                    </div>

                    <!-- Visión -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col items-center text-center mb-4">
                            <div class="bg-green-100 p-4 rounded-full mb-4">
                                <i class="fas fa-map-marked-alt text-green-600 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Visión</h3>
                        </div>
                        <p class="text-gray-600 leading-relaxed">
                            Ser referentes nacionales en acompañamiento psicosocial agrícola, usando tecnología para mejorar vidas.
                        </p>
                    </div>

                    <!-- Valores -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-orange-700 hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col items-center text-center mb-4">
                            <div class="bg-orange-100 p-4 rounded-full mb-4">
                                <i class="fas fa-handshake text-orange-700 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Valores</h3>
                        </div>
                        <p class="text-gray-600 leading-relaxed">
                            Valoramos respeto, empatía, solidaridad, responsabilidad y compromiso. Son pilares para fortalecer la comunidad agrícola.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- Sección: ¿Qué hacemos nosotros? Mejorada -->
        <section class="w-full py-16 bg-white">
            <div class="container mx-auto px-4">
                <!-- Encabezado mejorado -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-800 mb-4">
                        ¿Qué hacemos nosotros?
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-emerald-500 to-green-500 mx-auto mb-6 rounded-full"></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Transformamos el agro a través del bienestar, la tecnología y la sostenibilidad.
                    </p>
                </div>

                <!-- Grid de dos columnas -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                    <!-- Empresas enfocadas en impacto y reputación -->
                    <div class="bg-gradient-to-br from-white to-emerald-50 rounded-2xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-emerald-100 p-3 rounded-full mr-3">
                                <i class="fas fa-chart-line text-emerald-600 text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 text-center">
                                Impacto y Reputación
                            </h3>
                        </div>

                        <ul class="space-y-6">
                            <li class="flex items-start bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
                                <div class="bg-emerald-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-chart-line text-emerald-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Impacto Social Medible</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Accede a métricas para medir el bienestar y la transformación comunitaria generada por tu empresa.
                                    </p>
                                </div>
                            </li>

                            <li class="flex items-start bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
                                <div class="bg-blue-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-award text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Fortalecimiento Reputacional</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Posiciona tu empresa como un actor comprometido con el bienestar social.
                                    </p>
                                </div>
                            </li>

                            <li class="flex items-start bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
                                <div class="bg-amber-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-book-open text-amber-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Historias Auténticas</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Accede a contenido de alto valor para comunicar el impacto de tu empresa.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Empresas enfocadas en productividad y rentabilidad -->
                    <div class="bg-gradient-to-br from-white to-amber-50 rounded-2xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-center justify-center mb-6">
                            <div class="bg-amber-100 p-3 rounded-full mr-3">
                                <i class="fas fa-chart-bar text-amber-600 text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 text-center">
                                Productividad y Rentabilidad
                            </h3>
                        </div>

                        <ul class="space-y-6">
                            <li class="flex items-start bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
                                <div class="bg-orange-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-users text-orange-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Factor Humano Fortalecido</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Mejora el bienestar físico, emocional y económico de los colaboradores y sus familias.
                                    </p>
                                </div>
                            </li>

                            <li class="flex items-start bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
                                <div class="bg-green-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-chart-bar text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Aumento en Rendimiento</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Incrementa la productividad y reduce el ausentismo laboral.
                                    </p>
                                </div>
                            </li>

                            <li class="flex items-start bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
                                <div class="bg-cyan-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-leaf text-cyan-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Sostenibilidad Rentable</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Implementa iniciativas de bienestar con retorno económico y alto impacto social.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- CTA Mejorado -->
                <div class="mt-16 bg-gradient-to-r from-emerald-50 to-green-50 rounded-2xl shadow-lg p-8 max-w-4xl mx-auto">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">
                            ¿Tu empresa quiere patrocinar estos programas?
                        </h3>
                        <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                            Únete a nuestra misión de transformar el agro colombiano. Juntos podemos crear un impacto positivo y duradero.
                        </p>

                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="{{ route('cotizacion') }}" 
                               class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                <i class="fas fa-calendar-check"></i>
                                Solicitar reunión
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección adicional de información de contacto (consistente con cotización) -->
        <section class="w-full py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800 mb-3">Contáctanos</h2>
                        <p class="text-gray-600">Estamos aquí para transformar el agro contigo</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-emerald-500">
                            <div class="flex items-start space-x-4">
                                <div class="bg-emerald-100 p-3 rounded-full">
                                    <i class="fas fa-map-marker-alt text-emerald-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg mb-1">Ubicación</h3>
                                    <p class="text-gray-600">Colombia</p>
                                    <p class="text-emerald-600 font-medium">Cobertura Nacional</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-blue-500">
                            <div class="flex items-start space-x-4">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-phone text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg mb-1">Teléfono</h3>
                                    <p class="text-gray-600">+57 xxxxxxxx</p>
                                    <p class="text-gray-500 text-sm mt-1">Lunes a viernes 8:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-guest-layout>