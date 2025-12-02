<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register=false/>

    <section class="w-full py-28 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-green-100/20 via-transparent to-transparent"></div>
        <div class="absolute top-10 right-10 w-32 h-32 bg-green-200/30 rounded-full blur-2xl"></div>
        <div class="absolute bottom-10 left-10 w-40 h-40 bg-teal-200/20 rounded-full blur-3xl"></div>

        <div class="relative z-10 container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6 bg-gradient-to-r from-green-800 via-emerald-700 to-teal-800 bg-clip-text text-transparent">Cotización</h1>
                <p class="text-xl leading-relaxed text-gray-700 font-medium">
                    Complete el formulario para obtener una cotización personalizada que impulse el éxito personal y laboral de los agricultores colombianos, con atención psicosocial especializada y tecnología avanzada.
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Formulario - Columna izquierda (2/3) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">
                        Solicitud de Cotización
                    </h1>

                    <form action="{{ route('cotizacion.enviar') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Empresa -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">Empresa</label>
                                <input type="text" name="empresa" required
                                    class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            </div>

                            <!-- Nombre completo -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">Nombre completo</label>
                                <input type="text" name="nombre" required
                                    class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Cargo -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">Cargo</label>
                                <input type="text" name="cargo" required
                                    class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            </div>

                            <!-- Correo corporativo -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">Correo corporativo</label>
                                <input type="email" name="correo" required
                                    class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Teléfono</label>
                            <input type="text" name="telefono" required
                                class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Paquete de interés -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">Paquete de interés</label>
                                <select name="paquete" required
                                    class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Básico">Paquete Básico</option>
                                    <option value="Integral">Paquete Integral</option>
                                    <option value="Premium">Paquete Premium</option>
                                    <option value="Personalizado">Paquete Personalizado</option>
                                </select>
                            </div>

                            <!-- Número aproximado de participantes -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">Número aproximado de participantes</label>
                                <input type="number" name="participantes" required min="1"
                                    class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                            </div>
                        </div>

                        <!-- Proyecto -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Cuéntenos sobre su proyecto</label>
                            <textarea name="proyecto" required rows="4"
                                class="w-full border border-gray-300 rounded-lg p-3 mt-1 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"></textarea>
                        </div>

                        <!-- Políticas -->
                        <div class="flex items-start gap-3 bg-gray-50 p-4 rounded-lg">
                            <input type="checkbox" name="politicas" value="1" required class="mt-1">
                            <label class="text-sm text-gray-700">
                                Acepto la política de privacidad y tratamiento de datos personales
                            </label>
                        </div>

                        <!-- Botón -->
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full bg-emerald-600 text-white px-6 py-4 rounded-lg shadow-lg hover:bg-emerald-700 transition transform hover:-translate-y-1 font-semibold text-lg">
                                Enviar cotización
                            </button>
                        </div>
                    </form>

                    @if(session('success'))
                        <p class="text-green-600 font-semibold mt-6 p-4 bg-green-50 rounded-lg">
                            {{ session('success') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Panel de Información - Columna derecha (1/3) -->
            <div class="lg:col-span-1">
                <div class="sticky top-8 space-y-6">
                    <!-- Título del panel -->
                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-2xl shadow-lg p-6 text-white">
                        <h2 class="text-2xl font-bold mb-2">Información de Contacto</h2>
                        <p class="text-emerald-100">Estamos aquí para ayudarte</p>
                    </div>

                    <!-- Contenedor de Ubicación -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-emerald-500">
                        <div class="flex items-start space-x-4">
                            <div class="bg-emerald-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-lg mb-1">Ubicación</h3>
                                <p class="text-gray-600">Colombia</p>
                                <p class="text-emerald-600 font-medium">Cobertura Nacional</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contenedor de Teléfono -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-blue-500">
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-lg mb-1">Teléfono</h3>
                                <p class="text-gray-600">+57 xxxxxxxx</p>
                                <p class="text-gray-500 text-sm mt-1">Lunes a viernes 8:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contenedor de Correo -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-purple-500">
                        <div class="flex items-start space-x-4">
                            <div class="bg-purple-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-lg mb-1">Correo Electrónico</h3>
                                <div class="space-y-1">
                                    <p class="text-gray-600">ejemplo@gmail.com</p>
                                    <p class="text-gray-600">ejemplo2@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contenedor de Tiempo de Respuesta -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-amber-500">
                        <div class="flex items-start space-x-4">
                            <div class="bg-amber-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-lg mb-1">Tiempo de respuesta</h3>
                                <p class="text-gray-600">Máximo 48 horas</p>
                                <p class="text-emerald-600 font-medium mt-1">Respuesta garantizada</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nota adicional -->
                    <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow p-5 border border-gray-200">
                        <p class="text-gray-700 text-center">
                            <span class="font-semibold text-emerald-600">¡Pronto te contactaremos!</span> Nuestro equipo revisará tu solicitud y se pondrá en contacto contigo en el tiempo indicado.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer/>
</x-guest-layout>