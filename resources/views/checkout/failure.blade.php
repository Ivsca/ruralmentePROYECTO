<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <div class="mb-4">
                    <svg class="h-16 w-16 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                
                <h2 class="text-2xl font-bold text-red-600 mb-2">Hubo un problema con tu pago</h2>
                
                @if(isset($pedido) && $pedido)
                    <p class="text-gray-600 mb-6">El pago del pedido #{{ $pedido->id }} fue rechazado o no se completó.</p>

                    <div class="bg-gray-50 rounded-lg p-6 max-w-md mx-auto border border-gray-200 shadow-sm text-left">
                        <p class="mb-2"><strong>Motivo:</strong> {{ request('status_detail') ?? 'Desconocido' }}</p>
                        <p class="mb-2"><strong>Pago ID:</strong> {{ request('payment_id') ?? 'N/A' }}</p>
                        <p class="mb-0"><strong>Estado:</strong> {{ $pedido->estado }}</p>
                    </div>
                @else
                    <p class="text-gray-600 mb-6">No se pudo procesar el pago. Por favor intenta nuevamente.</p>
                @endif
                
                <div class="mt-8 space-x-4">
                     <form action="{{ route('checkout.iniciar') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">
                            Intentar de nuevo
                        </button>
                    </form>

                    <a href="{{ route('carrito.ver') }}" class="text-gray-600 hover:text-gray-900 underline">Volver al carrito</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
