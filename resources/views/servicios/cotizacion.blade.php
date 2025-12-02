<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register=false/>

    <section class="w-full py-28 bg-cover bg-center bg-no-repeat relative">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-black/40 to-transparent"></div>

        <div class="relative z-10 container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center text-white">
                <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6">Cotización</h1>
                <p class="text-xl leading-relaxed text-white/90">
                    Complete el formulario para obtener una cotización personalizada que impulse el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y tecnología avanzada.
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-3xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-8 text-gray-800">
            Solicitud de Cotización
        </h1>

        <form action="{{ route('cotizacion.enviar') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Empresa -->
            <div>
                <label class="block font-medium text-gray-700">Empresa</label>
                <input type="text" name="empresa" required
                    class="w-full border rounded p-2 mt-1">
            </div>

            <!-- Nombre completo -->
            <div>
                <label class="block font-medium text-gray-700">Nombre completo</label>
                <input type="text" name="nombre" required
                    class="w-full border rounded p-2 mt-1">
            </div>

            <!-- Cargo -->
            <div>
                <label class="block font-medium text-gray-700">Cargo</label>
                <input type="text" name="cargo" required
                    class="w-full border rounded p-2 mt-1">
            </div>

            <!-- Correo corporativo -->
            <div>
                <label class="block font-medium text-gray-700">Correo corporativo</label>
                <input type="email" name="correo" required
                    class="w-full border rounded p-2 mt-1">
            </div>

            <!-- Teléfono -->
            <div>
                <label class="block font-medium text-gray-700">Teléfono</label>
                <input type="text" name="telefono" required
                    class="w-full border rounded p-2 mt-1">
            </div>

            <!-- Paquete de interés -->
            <div>
                <label class="block font-medium text-gray-700">Paquete de interés</label>
                <select name="paquete" required
                    class="w-full border rounded p-2 mt-1">
                    <option value="">Seleccione una opción</option>
                    <option value="Básico">Paquete Básico</option>
                    <option value="Integral">Paquete Integral</option>
                    <option value="Premium">Paquete Premium</option>
                    <option value="Personalizado">Paquete Personalizado</option>
                </select>
            </div>

            <!-- Número aproximado de participantes -->
            <div>
                <label class="block font-medium text-gray-700">Número aproximado de participantes</label>
                <input type="number" name="participantes" required min="1"
                    class="w-full border rounded p-2 mt-1">
            </div>

            <!-- Proyecto -->
            <div>
                <label class="block font-medium text-gray-700">Cuéntenos sobre su proyecto</label>
                <textarea name="proyecto" required rows="4"
                    class="w-full border rounded p-2 mt-1"></textarea>
            </div>

            <!-- Políticas -->
            <div class="flex items-start gap-2">
                <input type="checkbox" name="politicas" value="1" required>
                <label class="text-sm text-gray-700">
                    Acepto la política de privacidad y tratamiento de datos personales
                </label>
            </div>

            <!-- Botón -->
            <button type="submit"
                class="bg-emerald-600 text-white px-6 py-3 rounded-lg shadow hover:bg-emerald-700 transition">
                Enviar cotización
            </button>
        </form>

        @if(session('success'))
            <p class="text-green-600 font-semibold mt-6">
                {{ session('success') }}
            </p>
        @endif

        

    </div>

    


    <x-footer/>
</x-guest-layout>
