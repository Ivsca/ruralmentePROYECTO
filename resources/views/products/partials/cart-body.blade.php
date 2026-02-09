
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 fw-bold">🛒 Mi Carrito</h1>

        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-primary" id="cart-count">
                {{ $cart->CantidadProductos ?? collect($cartItems)->sum('quantity') ?? 0 }} items
            </span>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Seguir comprando</a>
        </div>
    </div>

    @if(isset($cartItems) && count($cartItems))
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="list-group" id="cart-list">

                    @foreach($cartItems as $item)
                        @php
                            $p = $item->product;
                            $qty = $item->quantity;
                            $fallback = asset('fondos_imagenes_video/vietnam.jpg');
                            $imageUrl = $p->photo
                                ? (\Illuminate\Support\Str::startsWith($p->photo, ['http', 'https']) ? $p->photo : \Illuminate\Support\Facades\Storage::url($p->photo))
                                : $fallback;
                            $colorLabel = $item->color ?: '';
                            $escojido = $item->escojido ?? true;
                            $lineTotalDisplay = is_string($item->line_total)
                                ? $item->line_total
                                : number_format((($p->price ?? 0) * $qty), 2, '.', ',');
                        @endphp

                        <div class="list-group-item shadow-sm rounded-3 mb-2 cart-row {{ $escojido ? '' : 'opacity-50 text-decoration-line-through' }}"
                             data-product-id="{{ $p->id }}"
                             data-color="{{ $colorLabel }}"
                             data-talla="{{ $item->talla ?? '' }}"
                             data-price="{{ $p->price ?? 0 }}"
                             data-stock="{{ $p->stock ?? 0 }}">

                            <div class="mb-2">
                                @auth
                                    <div class="form-check">
                                        <input class="form-check-input item-selected"
                                               type="checkbox"
                                               id="select-{{ $p->id }}-{{ md5($colorLabel) }}"
                                               data-product-id="{{ $p->id }}"
                                               data-color="{{ $colorLabel }}"
                                               {{ $escojido ? 'checked' : '' }}>
                                        <label class="form-check-label ms-2" for="select-{{ $p->id }}-{{ md5($colorLabel) }}">
                                            Seleccionado
                                        </label>
                                    </div>
                                @else
                                    <div class="alert alert-warning p-2 mb-0">
                                        Usted no está registrado.
                                    </div>
                                @endauth
                            </div>

                            <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <a href="{{ route('products.show', $p->id) }}">
                                        <img src="{{ $imageUrl ?? $fallback }}"
                                             class="img-fluid rounded"
                                             style="width:96px;height:96px;object-fit:cover;"
                                             alt="{{ $p->name }}" onerror="this.src='{{ $fallback }}'">
                                    </a>
                                </div>

                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5 class="mb-1">
                                                <a href="{{ route('products.show', $p->id) }}" class="text-dark text-decoration-none">
                                                    {{ $p->name }}
                                                </a>
                                            </h5>

                                            <p class="text-muted small mb-1">
                                                {{ \Illuminate\Support\Str::limit($p->description ?? 'Sin descripción', 100, '...') }}
                                            </p>

                                            <div class="mb-2">
                                                <small class="text-muted">Color seleccionado:</small>
                                                <span class="badge ms-2"
                                                      style="background: {{ $item->color ?: '#6c757d' }}; color: #fff;">
                                                    {{ $item->color ?: 'Sin color' }}
                                                </span>
                                            </div>

                                            {{-- Precio unitario --}}
                                            <div class="mb-2">
                                                <small class="text-muted">Precio unitario:</small>
                                                <div class="fw-semibold">$ <span class="unit-price">{{ number_format($p->price ?? 0, 2, '.', ',') }}</span></div>
                                            </div>

                                            <div class="d-flex gap-2 align-items-center mt-2">
                                                <div class="input-group input-group-sm qty-group" style="width:140px;">
                                                    <button class="btn btn-outline-secondary btn-decrement" type="button"
                                                            data-product-id="{{ $p->id }}" data-color="{{ $colorLabel }}">−</button>

                                                    <input type="number" min="0"
                                                           value="{{ $qty }}"
                                                           class="form-control text-center qty-input"
                                                           data-product-id="{{ $p->id }}"
                                                           data-color="{{ $colorLabel }}"
                                                           data-talla="{{ $item->talla ?? '' }}">

                                                    <button class="btn btn-outline-secondary btn-increment" type="button"
                                                            data-product-id="{{ $p->id }}" data-color="{{ $colorLabel }}">+</button>
                                                </div>

                                                <small class="text-muted">Stock: <span class="stock-value">{{ $p->stock ?? 0 }}</span></small>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <div class="fw-semibold">$ <span class="line-total">{{ $lineTotalDisplay }}</span></div>

                                            <div class="mt-2 d-flex flex-column align-items-end gap-2">
                                                <button class="btn btn-outline-danger btn-sm btn-remove"
                                                        data-product-id="{{ $p->id }}"
                                                        data-color="{{ $colorLabel }}">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>

                                                <a href="{{ route('products.show', $p->id) }}" class="btn btn-outline-secondary btn-sm">
                                                    Ver
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="mt-3 d-flex justify-content-between">
                    <button class="btn btn-outline-danger" id="btn-clear-cart">Vaciar carrito</button>

                    <div>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary me-2">Seguir comprando</a>
                        <form action="{{ route('checkout.iniciar') }}" method="POST" style="width:100%;">
                            @csrf
                            <button type="submit" class="rm-btn rm-btn-primary" style="width:100%; justify-content:center; padding: 14px 16px;">
                                Proceder al pago
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Resumen --}}
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Resumen</h5>

                        <div class="d-flex justify-content-between mb-3">
                            <small class="text-muted">Subtotal</small>
                            <div class="h5 mb-0">$ <span id="subtotal">{{ is_string($subtotal) ? $subtotal : number_format((float)$subtotal, 2, '.', ',') }}</span></div>
                        </div>

                        <a href="{{ route('checkout') }}" class="btn btn-success btn-lg w-100">Ir a pagar</a>

                    </div>
                </div>

                <p class="small text-muted mt-2">
                    * Precios sujetos a validación en checkout.
                </p>
            </div>
        </div>

    @else
        <div class="text-center py-5">
            <h3 class="fw-bold">Tu carrito está vacío</h3>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Ver productos</a>
        </div>
    @endif

</div>

{{-- Modal eliminar / confirmar --}}
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="confirmModalBody">¿Estás seguro?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmModalBtn">Eliminar</button>
            </div>
        </div>
    </div>
</div>