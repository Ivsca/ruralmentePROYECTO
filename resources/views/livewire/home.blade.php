<div>
    <x-navbar-welcome :seeButton="2" :register="false" />
    
    <!-- Section Inicio - Responsive completo -->
    <section class="relative w-full min-h-screen md:h-screen bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('fondos_imagenes_video/ai-generated-8593083_1280.jpg') }}');">

        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/40 via-gray-700/20 to-transparent backdrop-blur-sm"></div>

        <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4 py-16 md:py-0">
            <div class="text-center text-white w-full max-w-6xl mx-auto">
                <!-- Logo responsive -->
                <img src="{{ asset('logos/Ruralmente_blanco.png') }}" alt="Ruralmente Logo" 
                     class="w-40 md:w-48 lg:w-64 object-contain mx-auto mb-4 md:mb-6">

                <!-- Título responsive -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold tracking-tight mb-3 md:mb-4 leading-tight">
                    Bienestar Rural – Café con Propósito
                </h1>

                <!-- Subtítulo responsive -->
                <p class="text-lg sm:text-xl md:text-2xl italic mb-4 md:mb-6 max-w-2xl mx-auto px-2">
                    Bienestar rural que transforma empresas y comunidades
                </p>
                
                <!-- Descripción responsive -->
                <div class="text-base sm:text-lg md:text-xl mb-6 md:mb-8 max-w-3xl mx-auto leading-relaxed px-2">
                    <p class="mb-2">Brindamos servicios de bienestar y salud mental a:</p>
                    <p class="text-sm sm:text-base">Mujeres campesinas, agricultores, ganaderos y caficultores. Mientras vendemos café premium producido por campesinos que priorizan su felicidad.</p>
                </div>

                <!-- Botones responsive -->
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4 mb-8 md:mb-10 justify-center px-2">
                    <a href="{{ route('ruralServicios') }}" 
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 sm:px-6 md:px-8 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2 text-sm sm:text-base">
                        <i class="fa-solid fa-leaf"></i> 
                        <span class="whitespace-nowrap">Conoce nuestros servicios</span>
                    </a>
                    
                    <a href="{{ route('mis-product') }}" 
                    class="bg-amber-600 hover:bg-amber-700 text-white px-5 py-3 sm:px-6 md:px-8 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2 text-sm sm:text-base">
                        <i class="fa-solid fa-mug-hot"></i> 
                        <span class="whitespace-nowrap">Mira nuestros productos</span>
                    </a>
                </div>

                <!-- Estadísticas responsive -->
                <div class="flex flex-col sm:flex-row gap-4 md:gap-6 justify-center px-2">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 md:p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-white/20 min-w-[140px]">
                        <span class="text-3xl sm:text-4xl md:text-4xl font-bold text-white block">500+</span>
                        <span class="text-sm sm:text-base md:text-lg text-white/90">Campesinos acompañados</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 md:p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-white/20 min-w-[140px]">
                        <span class="text-3xl sm:text-4xl md:text-4xl font-bold text-white block">15+</span>
                        <span class="text-sm sm:text-base md:text-lg text-white/90">Empresas aliadas</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 2: Dos formas de generar impacto real - Responsive -->
    <section class="w-full py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Título principal responsive -->
            <div class="text-center mb-8 sm:mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-3 md:mb-4">
                    Dos formas de generar impacto real
                </h2>
                <div class="w-16 sm:w-20 h-1 bg-emerald-500 mx-auto mb-3 md:mb-4 rounded-full"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-2xl mx-auto px-2">
                    Conectamos empresas con comunidades rurales a través de bienestar y café con propósito
                </p>
            </div>

            <!-- Grid responsive -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 max-w-6xl mx-auto">
                
                <!-- Columna Izquierda -->
                <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-6 sm:p-8 hover:shadow-xl transition-all duration-300 border-l-4 border-emerald-500">
                    <div class="mb-4 sm:mb-6">
                        <img 
                            src="{{ asset('fondos_imagenes_video/masaje.jpg') }}" 
                            alt="Servicios de Bienestar" 
                            class="w-full h-40 sm:h-48 md:h-56 object-cover rounded-lg sm:rounded-xl shadow-md"
                        >
                    </div>

                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="bg-emerald-100 p-2 sm:p-3 rounded-full mr-3">
                            <img 
                                src="{{ asset('icon/hoja.jpg') }}" 
                                alt="icono hoja"
                                class="w-6 h-6 sm:w-8 sm:h-8 object-contain"
                            >
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                            Servicios de Bienestar B2B
                        </h3>
                    </div>

                    <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed">
                        Programas de salud mental y bienestar para comunidades agrícolas y pecuarias, financiados por empresas que buscan impacto social, mejora en productividad o fortalecimiento de sus cadenas de valor rurales.
                    </p>
                    
                    <ul class="space-y-3 sm:space-y-4">
                        <li class="flex items-start bg-gray-50 p-2 sm:p-3 rounded-lg">
                            <div class="bg-emerald-100 p-1 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <span class="text-emerald-600 text-xs sm:text-sm font-bold">✓</span>
                            </div>
                            <span class="text-xs sm:text-sm md:text-base text-gray-700">Talleres de salud mental y bienestar emocional</span>
                        </li>
                        <li class="flex items-start bg-gray-50 p-2 sm:p-3 rounded-lg">
                            <div class="bg-emerald-100 p-1 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <span class="text-emerald-600 text-xs sm:text-sm font-bold">✓</span>
                            </div>
                            <span class="text-xs sm:text-sm md:text-base text-gray-700">Acompañamiento psicológico personalizado</span>
                        </li>
                        <li class="flex items-start bg-gray-50 p-2 sm:p-3 rounded-lg">
                            <div class="bg-emerald-100 p-1 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <span class="text-emerald-600 text-xs sm:text-sm font-bold">✓</span>
                            </div>
                            <span class="text-xs sm:text-sm md:text-base text-gray-700">Programas de desarrollo comunitario sostenible</span>
                        </li>
                    </ul>
                </div>

                <!-- Columna Derecha -->
                <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-6 sm:p-8 hover:shadow-xl transition-all duration-300 border-l-4 border-amber-600">
                    
                    <div class="mb-4 sm:mb-6">
                        <img 
                            src="{{ asset('fondos_imagenes_video/saco-de-arpillera-negro-de-cafe.jpg') }}" 
                            alt="Café de Campesinos Felices" 
                            class="w-full h-40 sm:h-48 md:h-56 object-cover rounded-lg sm:rounded-xl shadow-md"
                        >
                    </div>

                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="bg-amber-100 p-2 sm:p-3 rounded-full mr-3">
                            <img 
                                src="{{ asset('icon/taza.jpg') }}" 
                                alt="icono café"
                                class="w-6 h-6 sm:w-8 sm:h-8 object-contain"
                            >
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                            Café de Campesinos Felices
                        </h3>
                    </div>
                    
                    <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed">
                        Café premium producido por caficultores que priorizan su salud mental y bienestar, vendido a empresas para consumo interno o regalos corporativos.
                    </p>
                    
                    <ul class="space-y-3 sm:space-y-4">
                        <li class="flex items-start bg-amber-50 p-2 sm:p-3 rounded-lg">
                            <div class="bg-amber-100 p-1 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <span class="text-amber-600 text-xs sm:text-sm font-bold">✓</span>
                            </div>
                            <span class="text-xs sm:text-sm md:text-base text-gray-700">100% café colombiano de alta calidad</span>
                        </li>
                        <li class="flex items-start bg-amber-50 p-2 sm:p-3 rounded-lg">
                            <div class="bg-amber-100 p-1 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <span class="text-amber-600 text-xs sm:text-sm font-bold">✓</span>
                            </div>
                            <span class="text-xs sm:text-sm md:text-base text-gray-700">Cada compra apoya programas de bienestar rural</span>
                        </li>
                        <li class="flex items-start bg-amber-50 p-2 sm:p-3 rounded-lg">
                            <div class="bg-amber-100 p-1 sm:p-2 rounded-full mr-2 sm:mr-3 flex-shrink-0">
                                <span class="text-amber-600 text-xs sm:text-sm font-bold">✓</span>
                            </div>
                            <span class="text-xs sm:text-sm md:text-base text-gray-700">Ideal para consumo interno o regalos corporativos</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 3: Del bienestar, nace el mejor alimento - Responsive -->
    <section class="w-full py-12 sm:py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Título principal responsive -->
            <div class="text-center mb-8 sm:mb-12 md:mb-16 max-w-4xl mx-auto px-2">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-gray-800 mb-4 md:mb-6 leading-tight">
                    Del bienestar, nace el mejor alimento:
                </h2>
                <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-emerald-500 to-amber-600 mx-auto mb-4 md:mb-6 rounded-full"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed">
                    Cada inversión en nuestros programas cuenta una historia de transformación. Cuando una empresa financia nuestros servicios de bienestar para agricultores, ganaderos y caficultores, o elige nuestro Café de Campesinos Felices, se convierte en parte de un movimiento que prioriza el bienestar integral del campo colombiano.
                </p>
            </div>

            <!-- Tres bloques responsive -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 max-w-6xl mx-auto mb-8 sm:mb-10 md:mb-12">
                
                <!-- Bloque 1 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-emerald-500">
                    <div class="text-center mb-3 sm:mb-4">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-seedling text-emerald-600 text-lg sm:text-xl md:text-2xl"></i>
                        </div>
                        <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2">Inversión con Propósito</h3>
                    </div>
                    <p class="text-xs sm:text-sm md:text-base text-gray-600 text-center leading-relaxed">
                        Empresas eligen entre impacto social, fortalecimiento reputacional, o mejora en productividad de sus cadenas de valor rurales
                    </p>
                </div>

                <!-- Bloque 2 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-amber-500">
                    <div class="text-center mb-3 sm:mb-4">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-heart text-amber-600 text-lg sm:text-xl md:text-2xl"></i>
                        </div>
                        <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2">Bienestar Rural Integral</h3>
                    </div>
                    <p class="text-xs sm:text-sm md:text-base text-gray-600 text-center leading-relaxed">
                        Trabajadores del campo agrícola y pecuario reciben apoyo en salud mental, desarrollo personal y fortalecimiento comunitario
                    </p>
                </div>

                <!-- Bloque 3 -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-green-700">
                    <div class="text-center mb-3 sm:mb-4">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-chart-line text-green-700 text-lg sm:text-xl md:text-2xl"></i>
                        </div>
                        <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2">Resultados Tangibles</h3>
                    </div>
                    <p class="text-xs sm:text-sm md:text-base text-gray-600 text-center leading-relaxed">
                        Las empresas obtienen reportes de impacto, mejoras en reputación, aumento en motivación de productores, o café premium para consumo interno
                    </p>
                </div>
            </div>

            <!-- Línea divisoria -->
            <div class="max-w-4xl mx-auto mb-6 sm:mb-8 md:mb-12">
                <div class="border-t border-gray-200 relative">
                    <div class="absolute left-1/2 transform -translate-x-1/2 -top-2 bg-white px-3 sm:px-4">
                        <i class="fas fa-leaf text-emerald-500 text-lg sm:text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Beneficios diferenciados responsive -->
            <div class="max-w-4xl mx-auto text-center px-2">
                <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-4 sm:mb-6 md:mb-8">
                    Beneficios diferenciados según tu objetivo empresarial:
                </h3>
                
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center">
                    <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-4 py-3 sm:px-6 sm:py-4 md:px-8 md:py-4 rounded-lg sm:rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <h4 class="text-base sm:text-lg md:text-xl font-bold mb-1 sm:mb-2">Para Grandes Empresas</h4>
                        <p class="text-xs sm:text-sm opacity-90">Impacto social medible y fortalecimiento reputacional</p>
                    </div>
                    
                    <div class="bg-gradient-to-r from-amber-600 to-amber-700 text-white px-4 py-3 sm:px-6 sm:py-4 md:px-8 md:py-4 rounded-lg sm:rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <h4 class="text-base sm:text-lg md:text-xl font-bold mb-1 sm:mb-2">Para Cadenas de Valor</h4>
                        <p class="text-xs sm:text-sm opacity-90">Mejora en productividad y sostenibilidad de proveedores</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 4: PERCHAS CAMPESINAS - Responsive -->
    <section class="w-full py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Título responsive -->
            <div class="text-center mb-8 sm:mb-12 md:mb-16 max-w-3xl mx-auto px-2">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-3 md:mb-4">
                    PRODUCTOS RURALMENTE
                </h2>
                <div class="w-16 sm:w-20 h-1 bg-amber-600 mx-auto mb-3 md:mb-4 rounded-full"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed">
                    Lleva el espíritu del campo contigo, camisetas y gorras con diseños artesanales que apoyan el bienestar rural
                </p>
            </div>

            <!-- Grid de productos responsive -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 max-w-6xl mx-auto mb-8 sm:mb-10 md:mb-12">
                
                @php
                    // Opción 1: Si usas Laravel 8+ con inyección de dependencias
                    $featuredProducts = app(App\Http\Controllers\ProductController::class)->featuredProducts();
                    
                    // Opción 2: Usando el helper de Laravel
                    // $featuredProducts = \App\Models\Product::where('stock', '>', 0)
                    //     ->orderBy('created_at', 'desc')
                    //     ->take(3)
                    //     ->get();
                @endphp
                
                @forelse($featuredProducts as $product)
                    <!-- Producto {{ $loop->iteration }} -->
                    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden">
                        <div class="h-48 sm:h-56 md:h-64 overflow-hidden">
                            @if($product->photo)
                                <img src="{{ Storage::url($product->photo) }}" 
                                    alt="{{ $product->name }}" 
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                                    onerror="this.onerror=null; this.src='{{ asset('placeholder.jpg') }}';">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">Sin imagen</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-4 sm:p-6">
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-1 sm:mb-2">
                                {{ $product->name }}
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4">
                                @php
                                    // Usar helper Str::limit si está disponible
                                    $description = $product->description ?? '';
                                    if(function_exists('Str::limit')) {
                                        echo Str::limit($description, 100);
                                    } else {
                                        echo strlen($description) > 100 ? substr($description, 0, 100) . '...' : $description;
                                    }
                                @endphp
                            </p>
                            
                            <div class="flex items-center justify-between mb-3 sm:mb-4">
                                <span class="text-lg sm:text-xl md:text-2xl font-bold text-amber-600">
                                    $ {{ number_format($product->price, 0) }}
                                </span>
                                <div class="flex flex-col items-end">
                                    <span class="text-xs sm:text-sm text-gray-500">COP</span>
                                    <span class="text-xs {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} mt-1">
                                        Stock: {{ $product->stock }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex flex-col gap-2">
                                <a href="{{ route('products.show', $product->id) }}"
                                class="w-full text-center bg-amber-500 hover:bg-amber-600 text-white py-2 sm:py-3 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg text-sm sm:text-base">
                                    Ver detalles
                                </a>
                                
                                <form method="POST" action="{{ route('addCarrito') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    
                                    <button type="submit" 
                                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 sm:py-3 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg text-sm sm:text-base"
                                            {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                        {{ $product->stock > 0 ? 'Agregar al carrito' : 'Sin stock' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Si no hay productos -->
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-400 mb-4">
                            <i class="fas fa-box-open text-5xl mb-4"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">No hay productos disponibles</h3>
                        <p class="text-gray-500">Pronto tendremos nuevas perchas disponibles</p>
                    </div>
                @endforelse
            </div>

            <!-- Línea divisoria -->
            <div class="max-w-4xl mx-auto mb-4 sm:mb-6 md:mb-8">
                <div class="border-t border-gray-200"></div>
            </div>

            <!-- Nota de impacto social responsive -->
            <div class="text-center max-w-3xl mx-auto px-2">
                <div class="bg-gradient-to-r from-emerald-50 to-amber-50 rounded-xl sm:rounded-2xl p-4 sm:p-6 mb-4 sm:mb-6">
                    <p class="text-sm sm:text-base md:text-lg text-gray-700 leading-relaxed mb-2 sm:mb-4">
                        <i class="fas fa-hands-helping text-emerald-600 mr-2"></i>
                        Cada compra apoya directamente a los programas de bienestar emocional para agricultores, ganaderos y caficultores en el campo colombiano
                    </p>
                </div>

                <!-- Botón Ver Todos los Productos -->
                <a href="{{ route('products.index') }}" 
                class="inline-block px-4 py-2 sm:px-6 sm:py-3 md:px-8 md:py-3 bg-amber-600 hover:bg-amber-700 text-white text-base sm:text-lg md:text-xl rounded-lg sm:rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    Ver todas las perchas
                </a>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 5: CONTACTO - Responsive -->
    <section class="w-full py-12 sm:py-16 md:py-20 bg-gradient-to-br from-gray-900 to-emerald-900">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Título principal responsive -->
            <div class="text-center mb-8 sm:mb-12 md:mb-16 max-w-3xl mx-auto px-2">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 md:mb-4">
                    Genera impacto real. Únete a nuestra iniciativa.
                </h2>
                <div class="w-16 sm:w-20 h-1 bg-emerald-400 mx-auto rounded-full"></div>
            </div>

            <!-- Grid de contacto responsive -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 max-w-6xl mx-auto">
                
                <!-- Bloque 1 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 hover:bg-white/20 transition-all duration-300 border border-white/20">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-building text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h3 class="text-base sm:text-lg md:text-xl font-bold text-white mb-2 sm:mb-4 text-center">Para Empresas B2B</h3>
                    <p class="text-xs sm:text-sm text-gray-200 mb-3 sm:mb-6 leading-relaxed text-center">
                        Si representas una empresa interesada en colaborar con proyectos rurales...
                    </p>
                    <div class="text-emerald-300 font-semibold text-sm sm:text-base text-center break-words">
                        contacto@ruralmentes.com
                    </div>
                </div>

                <!-- Bloque 2 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 hover:bg-white/20 transition-all duration-300 border border-white/20">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-envelope text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h3 class="text-base sm:text-lg md:text-xl font-bold text-white mb-2 sm:mb-4 text-center">Escríbenos</h3>
                    <p class="text-xs sm:text-sm text-gray-200 mb-3 sm:mb-6 leading-relaxed text-center">
                        ¿Tienes preguntas o quieres saber más?
                    </p>
                    <div class="text-amber-300 font-semibold text-sm sm:text-base text-center break-words">
                        contacto@ruralmentes.com
                    </div>
                </div>

                <!-- Bloque 3 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 hover:bg-white/20 transition-all duration-300 border border-white/20">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-phone text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h3 class="text-base sm:text-lg md:text-xl font-bold text-white mb-2 sm:mb-4 text-center">Llámanos</h3>
                    <p class="text-xs sm:text-sm text-gray-200 mb-3 sm:mb-6 leading-relaxed text-center">
                        Comunícate directamente con nuestro equipo.
                    </p>
                    <div class="text-green-300 font-semibold text-sm sm:text-base text-center break-words">
                        +57 300 847 6257
                    </div>
                </div>
            </div>

            <div class="text-center mt-8 sm:mt-10 md:mt-12 max-w-2xl mx-auto px-2">
                <p class="text-sm sm:text-base md:text-lg text-gray-300 italic">
                    Estamos listos para ayudarte a crear un impacto positivo en las comunidades rurales colombianas.
                </p>
            </div>
        </div>
    </section>
    
    <x-footer />
</div>