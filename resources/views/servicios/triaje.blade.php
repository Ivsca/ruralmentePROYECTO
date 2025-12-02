<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false"/>

    <main class="w-full">
        <section class="w-full min-h-screen py-20 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden flex items-center justify-center">

            <!-- Fondos decorativos -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-green-100/20 via-transparent to-transparent"></div>
            <div class="absolute top-10 right-10 w-32 h-32 bg-green-200/30 rounded-full blur-2xl"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 bg-teal-200/20 rounded-full blur-3xl"></div>

            <div class="relative z-10 container mx-auto px-4">

                <!-- Título centrado arriba -->
                <div class="max-w-2xl mx-auto text-center mb-16">
                    <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6 bg-gradient-to-r from-green-800 via-emerald-700 to-teal-800 bg-clip-text text-transparent">
                        Triaje psicológico
                    </h1>
                    <p class="text-xl leading-relaxed text-gray-700 font-medium">
                        Servicios especializados diseñados para mejorar la salud mental y el bienestar psicosocial de las comunidades campesinas.
                    </p>
                </div>

                <!-- Contenedor CENTRADO -->
                <div class="flex justify-center">
                    <div class="bg-white rounded-xl p-10 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 w-full max-w-xl text-center">
                        <h3 class="text-2xl font-serif font-bold text-[#2E8B57] mb-6">
                            Acceso restringido
                        </h3>

                        <p class="mb-8 text-gray-700 leading-relaxed">
                            El módulo de triaje psicológico está protegido para salvaguardar la 
                            información sensible de las comunidades campesinas. Ingrese con las 
                            credenciales asignadas por Ruralmente.
                        </p>

                        <a href="#" class="bg-[#2E8B57] hover:bg-[#246b45] text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 text-sm">
                            Iniciar sesión
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <x-footer />
</x-guest-layout>
