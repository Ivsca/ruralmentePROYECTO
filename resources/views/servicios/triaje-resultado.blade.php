<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resultado del Triaje
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <!-- Encabezado -->
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-serif font-bold text-[#2E8B57] mb-4">
                        Resultado del Triaje Psicológico
                    </h1>
                    <p class="text-gray-600">
                        Triaje registrado el {{ $triaje->created_at->format('d/m/Y H:i') }}
                        @if($triaje->user_id)
                            por {{ $triaje->user->name ?? 'Usuario' }}
                        @endif
                    </p>
                </div>

                <!-- Tarjeta de nivel de atención -->
                @php
                    $nivelColores = [
                        'Atención inmediata' => 'bg-red-100 border-red-300 text-red-800',
                        'Atención en 24-48 horas' => 'bg-orange-100 border-orange-300 text-orange-800',
                        'Atención prioritaria' => 'bg-yellow-100 border-yellow-300 text-yellow-800',
                        'Atención rutinaria' => 'bg-green-100 border-green-300 text-green-800',
                    ];
                    $colorClase = $nivelColores[$triaje->nivel_atencion] ?? 'bg-gray-100 border-gray-300';
                @endphp

                <div class="bg-white rounded-xl shadow-lg p-8 mb-8 border border-gray-200">
                    <div class="{{ $colorClase }} p-6 rounded-lg mb-8 border-2">
                        <h2 class="text-2xl font-bold mb-2">Nivel de atención requerido:</h2>
                        <p class="text-3xl font-bold">{{ $triaje->nivel_atencion }}</p>
                    </div>

                    <!-- Datos del paciente -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">📋 Datos del paciente</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Nombre</p>
                                <p class="font-medium">{{ $triaje->nombre_paciente }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Edad</p>
                                <p class="font-medium">{{ $triaje->edad }} años</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Género</p>
                                <p class="font-medium">{{ $triaje->genero }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600">Fecha de registro</p>
                                <p class="font-medium">{{ $triaje->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Evaluación detallada -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">📊 Evaluación detallada</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-600">Riesgo suicida</p>
                                    <p class="font-medium">{{ $triaje->riesgo_suicida }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Riesgo de autolesión</p>
                                    <p class="font-medium">{{ $triaje->riesgo_autolesion }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Síntomas presentes</p>
                                    <p class="font-medium">{{ $triaje->sintomas ? implode(', ', $triaje->sintomas) : 'Ninguno' }}</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-600">Funcionamiento diario</p>
                                    <p class="font-medium">{{ $triaje->funcion_diaria }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Sistema de apoyo</p>
                                    <p class="font-medium">{{ $triaje->sistema_apoyo }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Nivel de urgencia</p>
                                    <p class="font-medium">{{ $triaje->urgencia }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contexto -->
                    @if($triaje->contexto)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">📝 Contexto de la consulta</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="whitespace-pre-line">{{ $triaje->contexto }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Recomendaciones -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">💡 Recomendaciones de atención</h3>
                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                            <div class="whitespace-pre-line font-medium text-blue-800">
                                {!! nl2br(e($triaje->recomendaciones)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">
                    <a href="{{ route('triaje.create') }}" 
                       class="bg-[#2E8B57] hover:bg-[#246b45] text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-center inline-flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Nuevo Triaje
                    </a>
                    <a href="{{ url('/dashboard') }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-center inline-flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Volver al Dashboard
                    </a>
                    
                    <!-- Opción para imprimir -->
                    <button onclick="window.print()" 
                            class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-center inline-flex items-center justify-center border border-gray-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Imprimir Resultado
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>