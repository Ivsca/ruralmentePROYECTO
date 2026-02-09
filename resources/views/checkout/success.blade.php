<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <div class="mb-4">
                    <svg class="h-16 w-16 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                
                <h2 class="text-2xl font-bold text-gray-800 mb-2">¡Pago Iniciado!</h2>
                
                @if(isset($pedido) && $pedido)
                    <p class="text-gray-600 mb-6">Hemos registrado tu pedido correctamente.</p>
                    
                    <div class="bg-gray-50 rounded-lg p-6 max-w-md mx-auto border border-gray-200 shadow-sm">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">N° Pedido:</span>
                            <span class="font-bold text-gray-800">#{{ $pedido->id }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-bold text-indigo-600">${{ number_format($pedido->subtotal_centavos / 100, 0, ',', '.') }} {{ $pedido->moneda ?? 'COP' }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-0">
                            <span class="text-gray-600">Estado:</span>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $pedido->estado }}
                            </span>
                        </div>
                    </div>
                @else
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 text-left">
                        <p class="text-sm text-yellow-700">
                            No pudimos encontrar los detalles del pedido automáticamente, pero tu pago fue procesado.
                            <br> Referencia externa: <strong>{{ request('external_reference') ?? 'N/A' }}</strong>
                        </p>
                    </div>
                @endif

                <div class="mt-8 space-x-4">
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900 underline">Seguir comprando</a>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Mis Pedidos
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
