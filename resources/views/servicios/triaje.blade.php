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

                    {{-- SI ESTÁ LOGUEADO --}}
                    
                        <!-- FORMULARIO COMPLETO DE TRIAJE -->
                        <div class="bg-white rounded-xl p-10 shadow-lg border border-gray-100 w-full max-w-3xl mx-auto">

                            <h2 class="text-3xl font-serif font-bold text-[#2E8B57] mb-10 text-center">
                                Datos del Paciente
                            </h2>

                            <form action="{{ route('triaje.store') }}" method="POST" class="space-y-12" id="triajeForm">
                                @csrf

                                <!-- 1. DATOS DEL PACIENTE -->
                                <section>
                                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">1. Datos del paciente</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-1">Nombre del paciente *</label>
                                            <input type="text" name="nombre_paciente" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                        </div>
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-1">Edad *</label>
                                            <input type="number" name="edad" min="0" max="120" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block font-medium text-gray-700 mb-1">Género *</label>
                                            <select name="genero" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                                <option value="" disabled selected>Seleccione una opción</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>

                                <!-- 2. EVALUACIÓN DE RIESGO -->
                                <section>
                                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">2. Evaluación de riesgo</h3>
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-2">Riesgo suicida *</label>
                                            <select name="riesgo_suicida" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                                <option value="" disabled selected>Seleccione una opción</option>
                                                <option value="Sin riesgo - No presenta ideación">Sin riesgo - No presenta ideación</option>
                                                <option value="Riesgo bajo - Ideación pasiva sin plan">Riesgo bajo - Ideación pasiva sin plan</option>
                                                <option value="Riesgo moderado - Ideación con plan pero sin intento">Riesgo moderado - Ideación con plan pero sin intento</option>
                                                <option value="Riesgo alto - Plan concreto o intento previo">Riesgo alto - Plan concreto o intento previo</option>
                                                <option value="Riesgo crítico - Intento reciente o inminente">Riesgo crítico - Intento reciente o inminente</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-2">Riesgo de autolesión *</label>
                                            <select name="riesgo_autolesion" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                                <option value="" disabled selected>Seleccione una opción</option>
                                                <option value="No presenta">No presenta</option>
                                                <option value="Historial previo">Historial previo</option>
                                                <option value="Ideación actual">Ideación actual</option>
                                                <option value="Comportamiento activo">Comportamiento activo</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>

                                <!-- 3. SÍNTOMAS PRESENTES -->
                                <section>
                                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">3. Síntomas presentes</h3>
                                    <p class="text-sm text-gray-600 mb-3">(Puede seleccionar más de uno)</p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                            <input type="checkbox" name="sintomas[]" value="Ansiedad" class="h-5 w-5 text-green-600 rounded">
                                            <span>Ansiedad</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                            <input type="checkbox" name="sintomas[]" value="Duelo" class="h-5 w-5 text-green-600 rounded">
                                            <span>Duelo</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                            <input type="checkbox" name="sintomas[]" value="Trauma" class="h-5 w-5 text-green-600 rounded">
                                            <span>Trauma</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                            <input type="checkbox" name="sintomas[]" value="Estrés" class="h-5 w-5 text-green-600 rounded">
                                            <span>Estrés</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                            <input type="checkbox" name="sintomas[]" value="Abuso de sustancias" class="h-5 w-5 text-green-600 rounded">
                                            <span>Abuso de sustancias</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded">
                                            <input type="checkbox" name="sintomas[]" value="Violencia doméstica" class="h-5 w-5 text-green-600 rounded">
                                            <span>Violencia doméstica</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded md:col-span-2">
                                            <input type="checkbox" name="sintomas[]" value="Otros" class="h-5 w-5 text-green-600 rounded">
                                            <span>Otros</span>
                                        </label>
                                    </div>
                                </section>

                                <!-- 4. NIVEL DE FUNCIONAMIENTO -->
                                <section>
                                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">4. Nivel de funcionamiento</h3>
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-2">Capacidad de funcionamiento diario *</label>
                                            <select name="funcion_diaria" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                                <option value="" disabled selected>Seleccione una opción</option>
                                                <option value="Excelente - Funciona normalmente">Excelente - Funciona normalmente</option>
                                                <option value="Bueno - Funciona bien con dificultad">Bueno - Funciona bien con dificultad</option>
                                                <option value="Moderado - Dificultades significativas pero manejables">Moderado - Dificultades significativas pero manejables</option>
                                                <option value="Bajo - Dificultades severas que afectan la vida diaria">Bajo - Dificultades severas que afectan la vida diaria</option>
                                                <option value="Crítico - Incapacidad para funcionar independientemente">Crítico - Incapacidad para funcionar independientemente</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-2">Sistema de apoyo *</label>
                                            <select name="sistema_apoyo" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                                <option value="" disabled selected>Seleccione una opción</option>
                                                <option value="Crítico">Crítico</option>
                                                <option value="Bajo">Bajo</option>
                                                <option value="Moderado">Moderado</option>
                                                <option value="Bueno">Bueno</option>
                                                <option value="Excelente">Excelente</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>

                                <!-- 5. URGENCIA Y CONTEXTO -->
                                <section>
                                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">5. Urgencia y contexto</h3>
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-2">Nivel de urgencia percibido *</label>
                                            <select name="urgencia" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                                <option value="" disabled selected>Seleccione una opción</option>
                                                <option value="Baja - Puede esperar atención programada">Baja - Puede esperar atención programada</option>
                                                <option value="Media - Requiere atención en días/semanas">Media - Requiere atención en días/semanas</option>
                                                <option value="Alta - Requiere atención en horas/días">Alta - Requiere atención en horas/días</option>
                                                <option value="Crítica - Requiere atención inmediata">Crítica - Requiere atención inmediata</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block font-medium text-gray-700 mb-2">Contexto de la consulta</label>
                                            <textarea name="contexto" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent h-28" 
                                                      placeholder="Describa brevemente la situación actual y el motivo de la consulta"></textarea>
                                            <p class="text-xs text-gray-500 mt-1">Máximo 2000 caracteres</p>
                                        </div>
                                    </div>
                                </section>

                                <!-- Mensajes de error -->
                                @if($errors->any())
                                    <div class="bg-red-50 border-l-4 border-red-500 p-4">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-red-800">
                                                    Por favor, corrija los siguientes errores:
                                                </h3>
                                                <div class="mt-2 text-sm text-red-700">
                                                    <ul class="list-disc pl-5 space-y-1">
                                                        @foreach($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="text-center pt-4">
                                    <button type="submit" 
                                            class="bg-[#2E8B57] hover:bg-[#246b45] text-white px-10 py-3 rounded-lg font-semibold transition-all duration-300 text-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        Calcular nivel de atención
                                    </button>
                                    <p class="text-sm text-gray-500 mt-3">
                                        * Campos obligatorios
                                    </p>
                                </div>
                            </form>
                        </div>
                </div>

            </div>
        </section>

    </main>

    <x-footer />
</x-guest-layout>