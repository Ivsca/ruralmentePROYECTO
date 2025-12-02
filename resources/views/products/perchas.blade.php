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
                    <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6">perchas</h1>
                    <p class="text-xl leading-relaxed text-white/90">
                        <strong>Ruralmente</strong> impulsa el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y tecnología avanzada.
                    </p>
                </div>
            </div>
        </section>
         
    </main>

    <x-footer />
</x-guest-layout>