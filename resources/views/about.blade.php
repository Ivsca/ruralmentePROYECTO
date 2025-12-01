<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false"/>

    <main class="w-full">
        <!-- Hero Section Mejorado -->
        <section class="w-full py-28 bg-cover bg-center bg-no-repeat relative"
                style="background-image: url('{{ asset('fondos_imagenes_video/wheat.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-black/40 to-transparent"></div>

            <div class="relative z-10 container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center text-white">
                    <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6">¿Quiénes Somos?</h1>
                    <p class="text-xl leading-relaxed text-white/90">
                        <strong>Ruralmente</strong> impulsa el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y tecnología avanzada.
                    </p>
                </div>
            </div>
        </section>

        <!-- Sección Misión, Visión, Valores con jerarquía visual -->
        <section class="w-full py-20 bg-gradient-to-b from-white to-[#F8F6F0]">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">

                    <!-- ¿Quiénes Somos? -->
                    <x-info-block 
                        title="¿Quiénes Somos?" 
                        icon="fas fa-seedling" 
                        bgIcon="#2E8B57" 
                        gradient="from-green-50 to-amber-50" 
                        text="Ruralmente impulsa el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y tecnología avanzada, mejorando productividad, relaciones y bienestar." />

                    <!-- Misión -->
                    <x-info-block 
                        title="Misión" 
                        icon="fas fa-brain" 
                        bgIcon="#8B4513" 
                        gradient="from-amber-100 to-white" 
                        text="Nuestra misión es más que palabras: es un compromiso emocional. Visualizamos un agro donde la salud mental es prioridad." />

                    <!-- Visión -->
                    <x-info-block 
                        title="Visión" 
                        icon="fas fa-map-marked-alt" 
                        bgIcon="#2E8B57" 
                        gradient="from-green-100 to-white" 
                        text="Ser referentes nacionales en acompañamiento psicosocial agrícola, usando tecnología para mejorar vidas." />

                    <!-- Valores -->
                    <x-info-block 
                        title="Valores" 
                        icon="fas fa-handshake text-white text-xl" 
                        bgIcon="#8B4513" 
                        gradient="from-amber-50 to-green-50" 
                        text="Valoramos respeto, empatía, solidaridad, responsabilidad y compromiso. Son pilares para fortalecer la comunidad agrícola." />

                </div>
            </div>
        </section>

        <!-- Sección: ¿Qué hacemos nosotros? -->
        <section class="w-full py-16 bg-gradient-to-b from-white to-[#F8F6F0]">
            <div class="container mx-auto px-4">

                <!-- Encabezado -->
                <div class="text-center mb-14">
                    <h2 class="text-4xl md:text-5xl font-serif font-bold text-[#35452B] mb-3">
                        ¿Qué hacemos nosotros?
                    </h2>
                    <div class="bg-[#35452B] w-20 h-[3px] mx-auto mb-6"></div>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        Transformamos el agro a través del bienestar, la tecnología y la sostenibilidad.
                    </p>
                </div>

                <!-- División por enfoque empresarial -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 max-w-5xl mx-auto">

                    <!-- Empresas enfocadas en impacto y reputación -->
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                        <h3 class="text-2xl font-serif font-bold text-[#2E8B57] mb-6 text-center">
                            Para empresas enfocadas en impacto y reputación
                        </h3>

                        <ul class="space-y-5">
                            <li class="flex items-start">
                                <i class="fas fa-chart-line text-[#6FBF80] text-2xl mr-4 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-[#35452B]">Impacto Social Medible</h4>
                                    <p class="text-gray-700 text-sm leading-relaxed">
                                        Accede a métricas para medir el bienestar y la transformación comunitaria generada por tu empresa.
                                    </p>
                                </div>
                            </li>

                            <li class="flex items-start">
                                <i class="fas fa-award text-[#8BC5E0] text-2xl mr-4 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-[#35452B]">Fortalecimiento Reputacional</h4>
                                    <p class="text-gray-700 text-sm leading-relaxed">
                                        Posiciona tu empresa como un actor comprometido con el bienestar social.
                                    </p>
                                </div>
                            </li>

                            <li class="flex items-start">
                                <i class="fas fa-book-open text-[#F5D98B] text-2xl mr-4 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-[#35452B]">Historias Auténticas</h4>
                                    <p class="text-gray-700 text-sm leading-relaxed">
                                        Accede a contenido de alto valor para comunicar el impacto de tu empresa.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Empresas enfocadas en productividad y rentabilidad -->
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-serif font-bold text-[#8B4513] mb-6 text-center">
                    Para empresas enfocadas en productividad y rentabilidad
                </h3>

                <ul class="space-y-5">
                    <li class="flex items-start">
                        <i class="fas fa-users text-[#D1B7A4] text-2xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-[#35452B]">Factor Humano Fortalecido</h4>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Mejora el bienestar físico, emocional y económico de los colaboradores y sus familias.
                            </p>
                        </div>
                    </li>

                    <li class="flex items-start">
                        <i class="fas fa-chart-bar text-[#6FBF80] text-2xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-[#35452B]">Aumento en Rendimiento</h4>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Incrementa la productividad y reduce el ausentismo laboral.
                            </p>
                        </div>
                    </li>

                    <li class="flex items-start">
                        <i class="fas fa-leaf text-[#8BC5E0] text-2xl mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-[#35452B]">Sostenibilidad Rentable</h4>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Implementa iniciativas de bienestar con retorno económico y alto impacto social.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center mt-16">
            <p class="text-lg text-gray-700 mb-6">
                ¿Tu empresa quiere patrocinar estos programas?
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-[#2E8B57] hover:bg-[#246b45] text-white px-7 py-3 rounded-lg font-semibold transition-all duration-300 text-sm">
                    Solicitar reunión
                </a>

                <a href="#" class="bg-[#8B4513] hover:bg-[#6e3610] text-white px-7 py-3 rounded-lg font-semibold transition-all duration-300 text-sm">
                    Enviar email
                </a>
            </div>
        </div>

    </div>
</section>

        
    </main>

    <x-footer />
</x-guest-layout>