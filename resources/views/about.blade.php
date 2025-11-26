<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false" />
    
    <!-- Header específico de about -->
    <header class="w-full py-20 text-white bg-gradient-to-b from-[#2E8B57] via-[#2E8B57]/80 to-transparent">
      <div class="container mx-auto px-4 text-center">
          <h1 class="text-4xl md:text-5xl font-serif font-bold mb-6">
              Sobre Nosotros
          </h1>
          <p class="text-xl max-w-3xl mx-auto leading-relaxed">
              Conoce la historia y propósito detrás de Ruralmente
          </p>
      </div>
    </header>


    <!-- Contenido principal de about -->
    <main class="w-full">
        <!-- Sección 1: ¿Quiénes somos? -->
        <section class="w-full py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <!-- Texto principal -->
                    <div class="text-center mb-12">
                        <h2 class="text-4xl md:text-5xl font-serif font-bold text-[#8B4513] mb-8 leading-tight">
                            Transformamos vidas rurales a través del bienestar y el café con propósito.
                        </h2>
                        
                        <p class="text-xl text-gray-700 leading-relaxed max-w-4xl mx-auto text-justify md:text-center">
                            Ruralmente es una iniciativa colombiana que une empresas, comunidades rurales y profesionales del bienestar para generar impacto social sostenible. Trabajamos con campesinos, caficultores y ganaderos para mejorar su salud mental, fortalecer sus comunidades y crear productos con propósito.
                        </p>
                    </div>

                    <!-- Imagen de apoyo -->
                    <div class="max-w-2xl mx-auto mb-12">
                        <img 
                            src="{{ asset('fondos_imagenes_video/agricultor.png') }}" 
                            alt="Comunidad rural de Ruralmente" 
                            class="w-full h-64 md:h-80 object-cover rounded-2xl shadow-lg"
                        >
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 2: Valores o pilares -->
        <section class="w-full py-16 bg-[#ECE8DD]">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#35452B] text-center mb-12">
                        Nuestros Pilares Fundamentales
                    </h2>

                    <!-- Grid de valores -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        
                        <!-- Valor 1: Bienestar emocional -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 text-center">
                            <div class="w-20 h-20 bg-[#2E8B57] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-heart text-white text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#35452B] mb-3">Bienestar Emocional</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Promovemos la salud mental y el equilibrio emocional en las comunidades rurales a través de programas especializados y acompañamiento profesional.
                            </p>
                        </div>

                        <!-- Valor 2: Desarrollo comunitario -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 text-center">
                            <div class="w-20 h-20 bg-[#8B4513] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-users text-white text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#35452B] mb-3">Desarrollo Comunitario</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Fortalecemos el tejido social rural mediante proyectos colaborativos que empoderan a las comunidades y fomentan el trabajo en equipo.
                            </p>
                        </div>

                        <!-- Valor 3: Café con propósito -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 text-center">
                            <div class="w-20 h-20 bg-[#35452B] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-mug-hot text-white text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#35452B] mb-3">Café con Propósito</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Comercializamos café premium producido por campesinos felices, donde cada taza cuenta una historia de bienestar y desarrollo rural.
                            </p>
                        </div>

                        <!-- Valor 4: Alianzas empresariales -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 text-center">
                            <div class="w-20 h-20 bg-[#2E8B57] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-handshake text-white text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#35452B] mb-3">Alianzas Empresariales</h3>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Conectamos empresas comprometidas con comunidades rurales, creando sinergias que generan impacto social medible y sostenible.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 3: CTA adicional -->
        <section class="w-full py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#35452B] mb-6">
                        ¿Listo para ser parte del cambio?
                    </h2>
                    <p class="text-xl text-gray-700 mb-8 max-w-2xl mx-auto">
                        Únete a nuestra iniciativa y descubre cómo puedes generar impacto real en las comunidades rurales colombianas.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('ruralCafe') }}" 
                           class="bg-[#35452B] hover:bg-[#2a3722] text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:-translate-y-1">
                            Conoce nuestro café
                        </a>
                        <a href="#contacto" 
                           class="border-2 border-[#35452B] text-[#35452B] hover:bg-[#35452B] hover:text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:-translate-y-1">
                            Contáctanos
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-guest-layout>