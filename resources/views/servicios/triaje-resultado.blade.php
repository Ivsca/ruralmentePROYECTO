@extends('layouts.triaje') 

@section('content')

<section class="w-full min-h-screen py-20 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden flex items-center justify-center">

    <!-- Fondos decorativos -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-green-100/20 via-transparent to-transparent"></div>
    <div class="absolute top-10 right-10 w-32 h-32 bg-green-200/30 rounded-full blur-2xl"></div>
    <div class="absolute bottom-10 left-10 w-40 h-40 bg-teal-200/20 rounded-full blur-3xl"></div>

    <div class="relative z-10 container mx-auto px-4">

        
        <div class="max-w-2xl mx-auto text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-serif font-bold tracking-wide mb-6 bg-gradient-to-r from-green-800 via-emerald-700 to-teal-800 bg-clip-text text-transparent">
                Resultado del Triaje
            </h1>
            <p class="text-lg text-gray-700">
                Análisis detallado del estado actual y nivel de atención recomendado.
            </p>
        </div>

       
        <div class="flex justify-center">

            <div class="bg-white rounded-xl p-10 shadow-lg border border-gray-100 w-full max-w-4xl mx-auto">

               
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-serif font-bold text-[#2E8B57] mb-4">
                        Resultado del Triaje Psicológico
                    </h2>
                    <p class="text-gray-600">
                        Triaje registrado el {{ $triaje->created_at->format('d/m/Y H:i') }}
                        @if($triaje->user_id)
                            por {{ $triaje->user->name ?? 'Usuario' }}
                        @endif
                    </p>
                </div>

                @php
                    $nivelColores = [
                        'Atención inmediata' => 'bg-red-100 border-red-300 text-red-800',
                        'Atención en 24-48 horas' => 'bg-orange-100 border-orange-300 text-orange-800',
                        'Atención prioritaria' => 'bg-yellow-100 border-yellow-300 text-yellow-800',
                        'Atención rutinaria' => 'bg-green-100 border-green-300 text-green-800',
                    ];
                    $colorClase = $nivelColores[$triaje->nivel_atencion] ?? 'bg-gray-100 border-gray-300';
                @endphp

               
                <div class="bg-white rounded-xl shadow p-8 mb-8 border border-gray-200">
                    <div class="{{ $colorClase }} p-6 rounded-lg mb-8 border-2 text-center">
                        <h2 class="text-2xl font-bold mb-2">Nivel de atención requerido</h2>
                        <p class="text-3xl font-bold">{{ $triaje->nivel_atencion }}</p>
                    </div>

                    <!-- Datos del paciente -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">📋 Datos del paciente</h3>
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

                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">📊 Evaluación detallada</h3>
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

                    
                    @if($triaje->contexto)
                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">📝 Contexto de la consulta</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="whitespace-pre-line">{{ $triaje->contexto }}</p>
                        </div>
                    </div>
                    @endif

                    
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">💡 Recomendaciones de atención</h3>
                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                            <div class="whitespace-pre-line font-medium text-blue-800">
                                {!! nl2br(e($triaje->recomendaciones)) !!}
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">
                    <a href="{{ route('triaje.create') }}" 
                       class="bg-[#2E8B57] hover:bg-[#246b45] text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-center inline-flex items-center justify-center">
                        Nuevo Triaje
                    </a>

                    <a href="{{ url('/dashboard') }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-center inline-flex items-center justify-center">
                        Volver al Dashboard
                    </a>

                    <button onclick="window.print()" 
                            class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-center inline-flex items-center justify-center border border-gray-300">
                        Imprimir Resultado
                    </button>
                </div>

            </div>
        </div>

    </div>

</section>

@endsection
