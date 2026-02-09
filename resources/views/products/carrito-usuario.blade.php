{{-- resources/views/products/carrito-usuario.blade.php --}}
@extends('layouts.user')

@section('page-title', 'Mi Carrito')
@section('page-subtitle', 'Revisa tus productos agregados y continúa tu compra')

@push('styles')
<style>
  :root{
    --rm-green: #2f8f57;
    --rm-green-2: #38a169;
    --rm-soft: #eef6f0;
    --rm-card: #ffffff;
    --rm-border: #d9e9df;
    --rm-text: #1f2937;
    --rm-muted: #6b7280;
    --rm-shadow: 0 14px 40px rgba(15, 23, 42, 0.06);
    --rm-shadow-sm: 0 10px 28px rgba(15, 23, 42, 0.05);
    --rm-radius: 18px;
  }

  /* Fondo general tipo “dashboard” */
  .rm-page-wrap{
    background: radial-gradient(1200px 500px at 15% 0%, rgba(56,161,105,0.10), transparent 55%),
                radial-gradient(900px 450px at 85% 10%, rgba(47,143,87,0.10), transparent 50%),
                linear-gradient(180deg, #f6fbf8 0%, #ffffff 60%);
    border-radius: 22px;
    padding: 22px;
  }

  .rm-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
    margin-bottom: 18px;
  }
  .rm-header-left{
    display:flex;
    align-items:flex-start;
    gap:12px;
  }
  .rm-icon{
    width:44px;height:44px;
    display:grid;place-items:center;
    border-radius: 14px;
    background: rgba(56,161,105,0.12);
    border: 1px solid rgba(56,161,105,0.20);
    color: var(--rm-green);
    font-size: 20px;
  }
  .rm-title{
    margin:0;
    font-weight: 800;
    color: var(--rm-text);
    letter-spacing: -0.3px;
  }
  .rm-subtitle{
    margin: 2px 0 0;
    color: var(--rm-muted);
    font-size: 14px;
  }

  .rm-actions{
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap: wrap;
    justify-content:flex-end;
  }

  .rm-pill{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding: 10px 14px;
    border-radius: 999px;
    border: 1px solid rgba(56,161,105,0.22);
    background: rgba(56,161,105,0.10);
    color: var(--rm-green);
    font-weight: 700;
    font-size: 13px;
  }

  .rm-btn{
    border-radius: 999px;
    padding: 10px 14px;
    font-weight: 700;
    border: 1px solid transparent;
    transition: all .15s ease;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    line-height: 1;
  }
  .rm-btn-primary{
    background: linear-gradient(180deg, var(--rm-green-2), var(--rm-green));
    color: #fff;
    box-shadow: 0 10px 18px rgba(47,143,87,0.18);
  }
  .rm-btn-primary:hover{ transform: translateY(-1px); color:#fff; }
  .rm-btn-outline{
    background:#fff;
    border-color: var(--rm-border);
    color: var(--rm-text);
  }
  .rm-btn-outline:hover{ border-color: rgba(47,143,87,0.35); color: var(--rm-green); }

  .rm-btn-danger{
    background: rgba(220, 38, 38, 0.08);
    border-color: rgba(220, 38, 38, 0.18);
    color: #b91c1c;
  }
  .rm-btn-danger:hover{ background: rgba(220, 38, 38, 0.12); }

  .rm-card{
    background: var(--rm-card);
    border: 1px solid var(--rm-border);
    border-radius: var(--rm-radius);
    box-shadow: var(--rm-shadow-sm);
  }
  .rm-card-header{
    padding: 16px 18px;
    border-bottom: 1px solid rgba(217,233,223,0.8);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
  }
  .rm-card-title{
    margin:0;
    font-weight: 800;
    color: var(--rm-text);
    letter-spacing:-0.2px;
    display:flex;
    gap:10px;
    align-items:center;
  }
  .rm-card-body{
    padding: 16px 18px;
  }

  .rm-grid{
    display:grid;
    grid-template-columns: 1fr;
    gap: 16px;
  }
  @media (min-width: 992px){
    .rm-grid{
      grid-template-columns: 1fr 360px;
      align-items:start;
    }
  }

  /* Items */
  .rm-item{
    border: 1px solid rgba(217,233,223,0.85);
    border-radius: 16px;
    padding: 14px;
    display:grid;
    grid-template-columns: 92px 1fr;
    gap: 14px;
    background: #fff;
    box-shadow: 0 10px 24px rgba(15, 23, 42, 0.04);
  }
  .rm-item.is-disabled{
    opacity: 0.55;
    text-decoration: line-through;
  }

  .rm-item-img{
    width:92px;height:92px;
    border-radius: 14px;
    object-fit: cover;
    border: 1px solid rgba(217,233,223,0.9);
    background: #f3faf6;
  }

  .rm-item-top{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:12px;
  }

  .rm-item-name{
    margin:0;
    font-weight: 800;
    color: var(--rm-text);
    text-decoration:none;
  }
  .rm-item-desc{
    margin: 6px 0 10px;
    color: var(--rm-muted);
    font-size: 13px;
  }

  .rm-badges{
    display:flex;
    gap:8px;
    flex-wrap: wrap;
  }
  .rm-badge{
    border-radius: 999px;
    padding: 6px 10px;
    font-size: 12px;
    font-weight: 700;
    border: 1px solid rgba(217,233,223,0.9);
    background: rgba(56,161,105,0.08);
    color: var(--rm-green);
  }
  .rm-badge-gray{
    background: #f3f4f6;
    color: #374151;
    border-color: #e5e7eb;
  }

  .rm-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 10px;
    flex-wrap: wrap;
  }

  .rm-price{
    font-variant-numeric: tabular-nums;
    font-weight: 800;
    color: var(--rm-text);
  }
  .rm-muted{
    color: var(--rm-muted);
    font-size: 13px;
  }

  .rm-qty{
    display:flex;
    align-items:center;
    gap: 8px;
  }
  .rm-qty button{
    width: 36px;
    height: 36px;
    border-radius: 999px;
    border: 1px solid var(--rm-border);
    background: #fff;
    font-weight: 900;
    color: var(--rm-text);
  }
  .rm-qty button:hover{
    border-color: rgba(47,143,87,0.35);
    color: var(--rm-green);
  }
  .rm-qty input{
    width: 80px;
    height: 36px;
    border-radius: 999px;
    border: 1px solid var(--rm-border);
    text-align:center;
    font-weight: 800;
    color: var(--rm-text);
    outline: none;
  }

  .rm-divider{
    height: 1px;
    background: rgba(217,233,223,0.9);
    margin: 12px 0;
  }

  /* Summary */
  .rm-summary-kv{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
    margin-top: 10px;
  }
  .rm-summary-label{ color: var(--rm-muted); font-size: 13px; }
  .rm-summary-value{ font-weight: 900; font-variant-numeric: tabular-nums; color: var(--rm-text); font-size: 20px; }

  .rm-note{
    margin-top: 10px;
    color: var(--rm-muted);
    font-size: 12px;
  }

  /* Checkbox “Seleccionado” */
  .rm-check{
    display:flex;
    align-items:center;
    gap:10px;
    user-select:none;
  }
  .rm-check input{
    width: 18px;height: 18px;
    accent-color: var(--rm-green);
  }
</style>
@endpush

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="rm-page-wrap">

  {{-- Header estilo dashboard --}}
  <div class="rm-header">
    <div class="rm-header-left">
      <div class="rm-icon">🛒</div>
      <div>
        <h2 class="rm-title">Mi Carrito</h2>
        <p class="rm-subtitle">Gestiona cantidades, selecciona productos y continúa al pago.</p>
      </div>
    </div>

    <div class="rm-actions">
      <span class="rm-pill" id="cart-count">
        {{ $cart->CantidadProductos ?? collect($cartItems)->sum('quantity') ?? 0 }} items
      </span>

      <a href="{{ route('products.index') }}" class="rm-btn rm-btn-outline">
        Seguir comprando
      </a>

      <a href="/" class="rm-btn rm-btn-primary">
        Mis Pedidos
      </a>
    </div>
  </div>

  @if(isset($cartItems) && count($cartItems))
    <div class="rm-grid">

      {{-- LISTA --}}
      <div class="rm-card">
        <div class="rm-card-header">
          <h4 class="rm-card-title">Productos en tu carrito</h4>
          <button class="rm-btn rm-btn-danger" id="btn-clear-cart" type="button">
            Vaciar carrito
          </button>
        </div>

        <div class="rm-card-body" id="cart-list">

          @foreach($cartItems as $item)
            @php
              $p = $item->product;
              $qty = (int)($item->quantity ?? 0);
              $fallback = asset('fondos_imagenes_video/vietnam.jpg');

              $imageUrl = $p->photo
                ? (\Illuminate\Support\Str::startsWith($p->photo, ['http', 'https']) ? $p->photo : \Illuminate\Support\Facades\Storage::url($p->photo))
                : $fallback;

              $colorLabel = $item->color ?: '';
              $tallaLabel = $item->talla ?? '';
              $escojido = $item->escojido ?? true;

              $lineTotalDisplay = is_string($item->line_total)
                ? $item->line_total
                : number_format((($p->price ?? 0) * $qty), 2, '.', ',');
            @endphp

            <div class="rm-item cart-row {{ $escojido ? '' : 'is-disabled' }}"
                 data-product-id="{{ $p->id }}"
                 data-color="{{ $colorLabel }}"
                 data-talla="{{ $tallaLabel }}"
                 data-price="{{ $p->price ?? 0 }}"
                 data-stock="{{ $p->stock ?? 0 }}">

              <a href="{{ route('products.show', $p->id) }}">
                <img src="{{ $imageUrl ?? $fallback }}"
                     class="rm-item-img"
                     alt="{{ $p->name }}"
                     onerror="this.src='{{ $fallback }}'">
              </a>

              <div>
                <div class="rm-item-top">
                  <div>
                    <a class="rm-item-name" href="{{ route('products.show', $p->id) }}">{{ $p->name }}</a>
                    <div class="rm-item-desc">
                      {{ \Illuminate\Support\Str::limit($p->description ?? 'Sin descripción', 110, '...') }}
                    </div>

                    <div class="rm-badges">
                      <span class="rm-badge {{ $colorLabel ? '' : 'rm-badge-gray' }}">
                        {{ $colorLabel ?: 'Sin color' }}
                      </span>

                      @if(!empty($tallaLabel))
                        <span class="rm-badge">👕 Talla {{ $tallaLabel }}</span>
                      @endif

                      <span class="rm-badge rm-badge-gray">
                        Stock: <span class="stock-value">{{ $p->stock ?? 0 }}</span>
                      </span>
                    </div>
                  </div>

                  <div style="text-align:right; min-width: 170px;">
                    <div class="rm-muted">Precio unitario</div>
                    <div class="rm-price">$ <span class="unit-price">{{ number_format($p->price ?? 0, 2, '.', ',') }}</span></div>

                    <div class="rm-divider"></div>

                    <div class="rm-muted">Total</div>
                    <div class="rm-price">$ <span class="line-total">{{ $lineTotalDisplay }}</span></div>
                  </div>
                </div>

                <div class="rm-divider"></div>

                <div class="rm-row">
                  <label class="rm-check">
                    <input class="item-selected"
                           type="checkbox"
                           data-product-id="{{ $p->id }}"
                           data-color="{{ $colorLabel }}"
                           data-talla="{{ $tallaLabel }}"
                           {{ $escojido ? 'checked' : '' }}>
                    <span class="rm-muted">Seleccionado</span>
                  </label>

                  <div class="rm-qty">
                    <button type="button" class="btn-decrement" data-product-id="{{ $p->id }}" data-color="{{ $colorLabel }}" data-talla="{{ $tallaLabel }}">−</button>

                    <input type="number"
                           min="0"
                           value="{{ $qty }}"
                           class="qty-input"
                           data-product-id="{{ $p->id }}"
                           data-color="{{ $colorLabel }}"
                           data-talla="{{ $tallaLabel }}">

                    <button type="button" class="btn-increment" data-product-id="{{ $p->id }}" data-color="{{ $colorLabel }}" data-talla="{{ $tallaLabel }}">+</button>
                  </div>

                  <div style="display:flex; gap:10px; flex-wrap:wrap; justify-content:flex-end;">
                    <button class="rm-btn rm-btn-danger btn-remove"
                            type="button"
                            data-product-id="{{ $p->id }}"
                            data-color="{{ $colorLabel }}"
                            data-talla="{{ $tallaLabel }}">
                      Eliminar
                    </button>

                    <a class="rm-btn rm-btn-outline" href="{{ route('products.show', $p->id) }}">
                      Ver
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>

      {{-- RESUMEN --}}
      <div class="rm-card">
        <div class="rm-card-header">
          <h4 class="rm-card-title">Resumen</h4>
        </div>

        <div class="rm-card-body">
          <div class="rm-summary-kv">
            <span class="rm-summary-label">Subtotal (seleccionados)</span>
            <span class="rm-summary-value">$ <span id="subtotal">{{ is_string($subtotal) ? $subtotal : number_format((float)$subtotal, 2, '.', ',') }}</span></span>
          </div>

          <div class="rm-divider"></div>

          <form action="{{ route('checkout.iniciar') }}" method="POST" style="width:100%;">
            @csrf
            <button type="submit" class="rm-btn rm-btn-primary" style="width:100%; justify-content:center; padding: 14px 16px;">
              Proceder al pago
            </button>
          </form>


          <p class="rm-note">* Precios sujetos a validación en checkout.</p>
        </div>
      </div>

    </div>

  @else
    <div class="rm-card">
      <div class="rm-card-body" style="text-align:center; padding: 36px 18px;">
        <div style="font-size: 42px; margin-bottom: 8px;">🛒</div>
        <h3 style="margin:0; font-weight:900; color: var(--rm-text);">Tu carrito está vacío</h3>
        <p class="rm-subtitle" style="margin-top: 8px;">Explora productos y agrega tus favoritos.</p>
        <a href="{{ route('products.index') }}" class="rm-btn rm-btn-primary" style="margin-top: 14px;">
          Ver productos
        </a>
      </div>
    </div>
  @endif

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/* ---------- CONFIG ---------- */
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const toggleUrl = "{{ route('carrito.toggleSelected') }}";
const updateUrl = "{{ route('carrito.update') }}";
const removeUrl = "{{ route('carrito.remove') }}";
const clearUrl  = "{{ route('carrito.clear') }}";

/* ---------- UTIL ---------- */
function parseNumberFromText(txt) {
  if (typeof txt === 'number') return txt;
  if (typeof txt !== 'string') txt = String(txt ?? '');
  const cleaned = txt.replace(/[^\d.\-]/g, '');
  const n = parseFloat(cleaned);
  return Number.isFinite(n) ? n : 0;
}

function formatCurrencyNumber(num) {
  const n = Number(num) || 0;
  return new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(n);
}

function displayFormatted(value) {
  const num = parseNumberFromText(value);
  return formatCurrencyNumber(num);
}

function cssEscapeSafe(v) {
  v = String(v ?? '');
  if (window.CSS && CSS.escape) return CSS.escape(v);
  // fallback básico
  return v.replace(/["\\]/g, '\\$&');
}

/* ---------- HELPERS ---------- */
function findRow(productId, color, talla='') {
  const pid = cssEscapeSafe(String(productId));
  const c   = cssEscapeSafe(String(color ?? ''));
  const t   = cssEscapeSafe(String(talla ?? ''));
  return document.querySelector(`.cart-row[data-product-id="${pid}"][data-color="${c}"][data-talla="${t}"]`);
}

function setRowDisabled(row, disabled) {
  if (!row) return;
  row.querySelectorAll('button, input, a').forEach(el => {
    // no deshabilitamos enlaces para no “romper” UX, pero sí botones e inputs
    if (el.tagName.toLowerCase() === 'a') return;
    el.disabled = disabled;
  });
}

/* ---------- INIT (formateo) ---------- */
document.addEventListener('DOMContentLoaded', () => {
  const subtotalEl = document.getElementById('subtotal');
  if (subtotalEl) subtotalEl.textContent = displayFormatted(subtotalEl.textContent);

  document.querySelectorAll('.line-total').forEach(el => el.textContent = displayFormatted(el.textContent));
  document.querySelectorAll('.unit-price').forEach(el => el.textContent = displayFormatted(el.textContent));

  document.querySelectorAll('.btn-decrement, .btn-increment').forEach(btn => {
    btn.addEventListener('click', onQtyChangeButton);
  });

  document.querySelectorAll('.btn-remove').forEach(btn => {
    btn.addEventListener('click', () => {
      confirmRemove(btn.dataset.productId, btn.dataset.color ?? '', btn.dataset.talla ?? '');
    });
  });

  // Debounce para input cantidad (UNICO handler, sin duplicados)
  const debouncedMap = new WeakMap();
  document.querySelectorAll('.qty-input').forEach(input => {
    input.addEventListener('input', (ev) => {
      const el = ev.target;

      if (debouncedMap.has(el)) clearTimeout(debouncedMap.get(el));

      const t = setTimeout(() => {
        const pid = el.dataset.productId;
        const color = el.dataset.color ?? '';
        const talla = el.dataset.talla ?? '';
        let v = parseInt(el.value || '0', 10);
        if (!Number.isFinite(v) || v < 0) v = 0;

        const row = findRow(pid, color, talla);
        const stock = row ? parseInt(row.dataset.stock || '0', 10) : 0;

        if (v > stock) {
          el.value = stock;
          toastWarn(`Stock disponible: ${stock}`);
          updateQuantity(pid, color, talla, stock);
          return;
        }

        el.value = v;
        updateQuantity(pid, color, talla, v);
      }, 450);

      debouncedMap.set(el, t);
    });

    input.addEventListener('blur', (ev) => {
      const el = ev.target;
      const pid = el.dataset.productId;
      const color = el.dataset.color ?? '';
      const talla = el.dataset.talla ?? '';
      let v = parseInt(el.value || '0', 10);
      if (!Number.isFinite(v) || v < 0) v = 0;

      const row = findRow(pid, color, talla);
      const stock = row ? parseInt(row.dataset.stock || '0', 10) : 0;

      if (v > stock) {
        el.value = stock;
        toastWarn(`Stock disponible: ${stock}`);
        updateQuantity(pid, color, talla, stock);
        return;
      }

      el.value = v;
      updateQuantity(pid, color, talla, v);
    });
  });

  const btnClear = document.getElementById('btn-clear-cart');
  if (btnClear) btnClear.addEventListener('click', confirmClear);
});

/* ---------- UX helpers ---------- */
function toastWarn(msg){
  Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'warning',
    title: msg,
    showConfirmButton: false,
    timer: 1800
  });
}

function toastOk(msg){
  Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: msg,
    showConfirmButton: false,
    timer: 1400
  });
}

/* ---------- ACTIONS: +/- ---------- */
function onQtyChangeButton(ev) {
  const btn = ev.currentTarget;
  const pid = btn.dataset.productId;
  const color = btn.dataset.color ?? '';
  const talla = btn.dataset.talla ?? '';

  const row = findRow(pid, color, talla);
  if (!row) return;

  const input = row.querySelector('.qty-input');
  if (!input) return;

  let current = parseInt(input.value || '0', 10);
  if (!Number.isFinite(current) || current < 0) current = 0;

  const delta = btn.classList.contains('btn-decrement') ? -1 : 1;
  let next = current + delta;

  const stock = parseInt(row.dataset.stock || '0', 10);
  if (next > stock) {
    next = stock;
    toastWarn(`Stock disponible: ${stock}`);
  }

  if (next < 0) next = 0;

  input.value = next;
  updateQuantity(pid, color, talla, next);
}

/* ---------- AJAX: updateQuantity ---------- */
async function updateQuantity(productId, color, talla, qty) {
  const row = findRow(productId, color, talla);
  if (!row) return;

  const stock = parseInt(row.dataset.stock || '0', 10);
  if (qty > stock) qty = stock;

  setRowDisabled(row, true);

  try {
    const res = await fetch(updateUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        product_id: Number(productId),
        color: String(color ?? ''),
        talla: String(talla ?? ''),
        quantity: Number(qty)
      })
    });

    if (!res.ok) {
      const txt = await res.text().catch(() => '');
      throw new Error('HTTP ' + res.status + ' - ' + txt);
    }

    const data = await res.json();
    if (!data.ok) throw new Error(data.message || 'Server ok=false');

    // contador
    const cartCountEl = document.getElementById('cart-count');
    if (cartCountEl && typeof data.count !== 'undefined') {
      cartCountEl.textContent = (data.count || 0) + ' items';
    }

    // subtotal
    const subtotalEl = document.getElementById('subtotal');
    if (subtotalEl) {
      subtotalEl.textContent = displayFormatted(data.subtotal_selected ?? data.subtotal ?? 0);
    }

    // line total (cliente)
    const lineTotalEl = row.querySelector('.line-total');
    if (lineTotalEl) {
      const price = parseNumberFromText(row.dataset.price ?? 0);
      lineTotalEl.textContent = displayFormatted(price * qty);
    }

    if (qty <= 0) {
      row.remove();
      toastOk('Producto eliminado');
    }
  } catch (err) {
    console.error('updateQuantity error', err);
    Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo actualizar la cantidad.' });
  } finally {
    setRowDisabled(row, false);
  }
}

/* ---------- AJAX: toggleSelected ---------- */
document.addEventListener('change', async (e) => {
  const el = e.target;
  if (!el.classList || !el.classList.contains('item-selected')) return;

  const productId = el.dataset.productId;
  const color = el.dataset.color ?? '';
  const talla = el.dataset.talla ?? '';
  const selected = !!el.checked;

  el.disabled = true;
  const row = findRow(productId, color, talla);

  try {
    const res = await fetch(toggleUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        product_id: Number(productId),
        color: String(color ?? ''),
        talla: String(talla ?? ''),
        selected
      })
    });

    if (!res.ok) {
      const txt = await res.text().catch(()=> '');
      throw new Error('HTTP ' + res.status + ' - ' + txt);
    }

    const json = await res.json();
    if (!json.ok) throw new Error(json.message || 'ok=false');

    // contador
    const cartCountEl = document.getElementById('cart-count');
    if (cartCountEl && typeof json.count !== 'undefined') {
      cartCountEl.textContent = (json.count || 0) + ' items';
    }

    // subtotal
    const subtotalEl = document.getElementById('subtotal');
    if (subtotalEl) subtotalEl.textContent = displayFormatted(json.subtotal_selected ?? json.subtotal ?? 0);

    // UI strike
    if (row) row.classList.toggle('is-disabled', !selected);
  } catch (err) {
    console.error('toggleSelected error', err);
    Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo guardar la selección.' });
    el.checked = !selected;
  } finally {
    el.disabled = false;
  }
});

/* ---------- REMOVE ---------- */
function confirmRemove(productId, color, talla) {
  Swal.fire({
    icon: 'warning',
    title: '¿Eliminar producto?',
    text: 'Se eliminará este producto de tu carrito.',
    showCancelButton: true,
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar',
    confirmButtonColor: '#d33'
  }).then(async (r) => {
    if (!r.isConfirmed) return;
    await removeFromCart(productId, color, talla);
  });
}

async function removeFromCart(productId, color, talla) {
  const row = findRow(productId, color, talla);
  if (row) setRowDisabled(row, true);

  try {
    const res = await fetch(removeUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        product_id: Number(productId),
        color: String(color ?? ''),
        talla: String(talla ?? '')
      })
    });

    if (!res.ok) {
      const txt = await res.text().catch(()=> '');
      throw new Error('HTTP ' + res.status + ' - ' + txt);
    }

    const data = await res.json();
    if (!data.ok) throw new Error(data.message || 'ok=false');

    if (row) row.remove();

    const cartCountEl = document.getElementById('cart-count');
    if (cartCountEl && typeof data.count !== 'undefined') {
      cartCountEl.textContent = (data.count || 0) + ' items';
    }

    const subtotalEl = document.getElementById('subtotal');
    if (subtotalEl) subtotalEl.textContent = displayFormatted(data.subtotal_selected ?? data.subtotal ?? 0);

    toastOk('Producto eliminado');
  } catch (err) {
    console.error('removeFromCart error', err);
    Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo eliminar el producto.' });
    if (row) setRowDisabled(row, false);
  }
}

/* ---------- CLEAR CART ---------- */
function confirmClear() {
  Swal.fire({
    icon: 'warning',
    title: '¿Vaciar carrito?',
    text: 'Se eliminarán todos los productos del carrito.',
    showCancelButton: true,
    confirmButtonText: 'Sí, vaciar',
    cancelButtonText: 'Cancelar',
    confirmButtonColor: '#d33'
  }).then(async (r) => {
    if (!r.isConfirmed) return;

    try {
      const res = await fetch(clearUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
          'Accept': 'application/json'
        },
        body: JSON.stringify({})
      });

      if (!res.ok) throw new Error('HTTP ' + res.status);
      const data = await res.json();
      if (!data.ok) throw new Error(data.message || 'ok=false');

      document.querySelectorAll('.cart-row').forEach(r => r.remove());

      const cartCountEl = document.getElementById('cart-count');
      if (cartCountEl) cartCountEl.textContent = '0 items';

      const subtotalEl = document.getElementById('subtotal');
      if (subtotalEl) subtotalEl.textContent = displayFormatted(0);

      toastOk('Carrito vaciado');
    } catch (err) {
      console.error('clear cart error', err);
      Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo vaciar el carrito.' });
    }
  });
}
</script>
@endpush
