<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register="false"/>

    <main class="w-full">
        <!-- Hero Section Modernizado -->
        <section class="w-full py-20 bg-cover bg-center bg-no-repeat relative">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="relative z-10 container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center text-white">
                    <h1 >¿Quiénes Somos?</h1>
                    <p >
                        <strong>Ruralmente</strong> es una empresa que impulsa el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y el uso de tecnología avanzada.
                    </p>
                </div>
            </div>
        </section>

    </main>

    <x-footer />
</x-guest-layout>