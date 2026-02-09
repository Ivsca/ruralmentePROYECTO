<script>
/* ---------- CONFIG ---------- */
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const toggleUrl = "{{ route('carrito.toggleSelected') }}";
const updateUrl = "{{ route('carrito.update') }}";
const removeUrl = "{{ route('carrito.remove') }}";
const clearUrl = "{{ route('carrito.clear') }}";

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
    if (value === null || typeof value === 'undefined') return formatCurrencyNumber(0);
    const num = parseNumberFromText(value);
    return formatCurrencyNumber(num);
}

/* ---------- PAGE INIT ---------- */
document.addEventListener('DOMContentLoaded', () => {
    // Formatear valores iniciales
    const subtotalEl = document.getElementById('subtotal');
    if (subtotalEl) subtotalEl.textContent = displayFormatted(subtotalEl.textContent);

    document.querySelectorAll('.line-total').forEach(el => {
        el.textContent = displayFormatted(el.textContent);
    });

    document.querySelectorAll('.unit-price').forEach(el => {
        el.textContent = displayFormatted(el.textContent);
    });

    // Delegation: botones +/-
    document.querySelectorAll('.btn-decrement').forEach(btn => btn.addEventListener('click', onQtyChangeButton));
    document.querySelectorAll('.btn-increment').forEach(btn => btn.addEventListener('click', onQtyChangeButton));

    // Delegation: botones eliminar
    document.querySelectorAll('.btn-remove').forEach(b => b.addEventListener('click', (e) => {
        const pid = b.dataset.productId;
        const color = b.dataset.color ?? '';
        confirmRemove(pid, color);
    }));

    // Input manual con debounce
    const debouncedMap = new WeakMap();
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('input', (ev) => {
            const el = ev.target;
            if (debouncedMap.has(el)) clearTimeout(debouncedMap.get(el));
            const t = setTimeout(() => {
                const pid = el.dataset.productId;
                const color = el.dataset.color ?? '';
                let v = parseInt(el.value || '0', 10);
                if (isNaN(v) || v < 0) v = 0;
                // valida stock en cliente antes de enviar
                const row = findRow(pid, color);
                const stock = row ? parseInt(row.dataset.stock || '0', 10) : 0;
                if (v > stock) {
                    el.value = stock;
                    showAlertModal(`No hay suficiente stock. Stock disponible: ${stock}`);
                    updateQuantity(pid, color, stock);
                    return;
                }
                el.value = v;
                updateQuantity(pid, color, v);
            }, 600);
            debouncedMap.set(el, t);
        });

        input.addEventListener('blur', (ev) => {
            const el = ev.target;
            const pid = el.dataset.productId;
            const color = el.dataset.color ?? '';
            let v = parseInt(el.value || '0', 10);
            if (isNaN(v) || v < 0) v = 0;
            const row = findRow(pid, color);
            const stock = row ? parseInt(row.dataset.stock || '0', 10) : 0;
            if (v > stock) {
                el.value = stock;
                showAlertModal(`No hay suficiente stock. Stock disponible: ${stock}`);
                updateQuantity(pid, color, stock);
                return;
            }
            el.value = v;
            updateQuantity(pid, color, v);
        });
    });

    // Vaciar carrito
    const btnClear = document.getElementById('btn-clear-cart');
    if (btnClear) btnClear.addEventListener('click', () => {
        confirmClear();
    });
});

/* ---------- HELPERS UI ---------- */
function findRow(productId, color) {
    color = String(color ?? '');
    return document.querySelector(`.cart-row[data-product-id="${productId}"][data-color="${color}"]`);
}
function setRowDisabled(row, disabled) {
    if (!row) return;
    row.querySelectorAll('button, input').forEach(el => el.disabled = disabled);
}


/* -----------------------------
   LOGICA DE ELIMINACION (modificada)
   Solo aquí cambié / añadí código.
   ----------------------------- */

/* Mapa para temporizadores por input */
const eliminarTimers = new WeakMap();
/* 5 minutos = 300000. Para pruebas cambia a 10000 (10s) */
const ELIMINACION_DELAY_MS = 300000;

/**
 * EliminarProducto: programa eliminación dentro de ELIMINACION_DELAY_MS
 * - No duplica timers
 */
function EliminarProducto(input, pid, color) {
    if (!input) return;
    if (eliminarTimers.has(input)) return; // ya programado

    const timerId = setTimeout(() => {
        EliminarDefinitivamente(pid, color, input);
    }, ELIMINACION_DELAY_MS);

    eliminarTimers.set(input, timerId);

    Swal.fire({
        icon: 'info',
        title: 'Eliminación programada',
        html: 'Se eliminará este producto en <b>5 minutos</b> si la cantidad sigue vacía o menor a 1. ' +
              'Si escribes un número >= 1 la eliminación será cancelada.',
        confirmButtonText: 'Entendido'
    });
}

/**
 * CancelarEliminarProducto: cancela timer si existe
 */
function CancelarEliminarProducto(input) {
    if (!input) return;
    if (!eliminarTimers.has(input)) return;
    clearTimeout(eliminarTimers.get(input));
    eliminarTimers.delete(input);

    // pequeño toast para confirmar cancelación
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: 'Eliminación cancelada',
        showConfirmButton: false,
        timer: 1200
    });
}

/**
 * EliminarDefinitivamente: solo elimina si input sigue vacío o <1
 */
async function EliminarDefinitivamente(pid, color, input) {
    // limpiar referencia del timer (si existiera)
    if (input && eliminarTimers.has(input)) {
        clearTimeout(eliminarTimers.get(input));
        eliminarTimers.delete(input);
    }

    // re-evaluar valor actual
    const raw = input ? String(input.value).trim() : '';
    const n = raw === '' ? NaN : parseInt(raw, 10);

    const debeEliminar = (raw === '' || !Number.isFinite(n) || n < 1);

    if (!debeEliminar) {
        // El usuario corrigió la cantidad: no eliminar
        return;
    }

    // Llamamos a la función ya existente que elimina del servidor y actualiza DOM
    try {
        await removeFromCart(pid, color); // reutiliza tu función existente
        // opcional: notificar éxito ya lo hace removeFromCart al actualizar DOM, pero damos feedback también
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Producto eliminado automáticamente',
            showConfirmButton: false,
            timer: 1600
        });
    } catch (err) {
        console.error('EliminarDefinitivamente error', err);
        Swal.fire({
            icon: 'error',
            title: 'Error al eliminar',
            text: 'No se pudo eliminar el producto automáticamente.'
        });
    }
}

/* Por compatibilidad con el resto del script: llamadas antiguas a startEmptyTimer/clearEmptyTimer
   ahora delegan a EliminarProducto/CancelarEliminarProducto pero con una protección:
   - si startEmptyTimer se llama mientras el campo está aún focalizado (user typing), no programamos.
   - la programación efectiva ocurrirá normalmente si startEmptyTimer se invoca desde blur,
     o cuando explícitamente se quiere programar (por ejemplo desde onQtyChangeButton).
*/
function startEmptyTimer(input, pid, color) {
    if (!input) return;
    // Si el usuario todavía está escribiendo (focus), NO programamos ahora.
    // El blur del input volverá a llamar startEmptyTimer y ahí sí se programará.
    if (document.activeElement === input) {
        return;
    }
    EliminarProducto(input, pid, color);
}
function clearEmptyTimer(input) {
    CancelarEliminarProducto(input);
}

/* ---------- ACTIONS (botones +/-) ---------- */
function onQtyChangeButton(ev) {
    const btn = ev.currentTarget;
    const pid = btn.dataset.productId;
    const color = btn.dataset.color ?? '';
    const row = findRow(pid, color);
    if (!row) return;

    const input = row.querySelector('.qty-input');
    if (!input) return;

    // Si el input está vacío y el usuario presiona + ó -, asumimos 1
    if (input.value.trim() === '') {
        input.value = 1;
        clearEmptyTimer(input);
    }

    let current = parseInt(input.value || '1', 10);
    if (isNaN(current) || current < 1) current = 1;

    const delta = btn.classList.contains('btn-decrement') ? -1 : 1;
    let next = current + delta;

    // NUEVA LÓGICA: si el usuario decrementa y el resultado sería <1,
    // interpretamos como intención de eliminar: dejamos el input vacío y programamos EliminarProducto
    if (delta === -1 && next < 1) {
        input.value = ''; // dejamos en blanco para indicar intención
        EliminarProducto(input, pid, color);
        // informamos al usuario
        Swal.fire({
            icon: 'info',
            title: 'Producto pendiente de eliminación',
            html: 'Se ha programado eliminar este producto en <b>5 minutos</b>. ' +
                  'Si quieres cancelar, escribe una cantidad mayor o igual a 1.',
            confirmButtonText: 'Entendido'
        });
        return;
    }

    // Si incremento o decremento dentro de rango normal -> cancelar timers si existían
    clearEmptyTimer(input);

    if (next < 1) {
        Swal.fire({
            icon: "warning",
            title: "Cantidad mínima",
            text: "No puedes pedir menos de 1 producto.",
            confirmButtonColor: "#3085d6"
        });
        input.value = 1;
        return;
    }

    const stock = parseInt(row.dataset.stock || '0', 10);
    if (next > stock) {
        Swal.fire({
            icon: "error",
            title: "Stock insuficiente",
            text: `No hay suficiente stock. Cantidad disponible: ${stock}`,
            confirmButtonColor: "#d33"
        });
        input.value = Math.max(1, stock);
        if (stock >= 1) updateQuantity(pid, color, stock);
        return;
    }

    input.value = next;
    updateQuantity(pid, color, next);
}

/* ---------- INPUT HANDLING (actualizado con nueva lógica) ---------- */
document.querySelectorAll('.qty-input').forEach(input => {

    input.addEventListener('input', (ev) => {
        const el = ev.target;
        const pid = el.dataset.productId;
        const color = el.dataset.color ?? '';

        // Si el input está vacío mientras escribe, NO programamos la eliminación todavía.
        // Solo cancelamos cualquier timer activo (si existiera) para evitar que un timer antiguo borre el item
        if (el.value.trim() === '') {
            // no programar aquí; esperar al blur o a intención explícita
            // Cancelar cualquier timer viejo (por seguridad)
            clearEmptyTimer(el);
            return;
        }

        // Si ya escribió algo, cancelamos timer de eliminar
        clearEmptyTimer(el);

        // Validación básica (no enviamos update aquí, las otras secciones se encargan)
        let v = parseInt(el.value, 10);
        if (isNaN(v) || v < 1) return; // No corregir todavía, dejar que el usuario termine de editar
    });

    input.addEventListener('blur', (ev) => {
        const el = ev.target;
        const pid = el.dataset.productId;
        const color = el.dataset.color ?? '';

        if (el.value.trim() === '') {
            // El usuario dejó el campo vacío y salió del input: AQUI programamos la eliminación
            startEmptyTimer(el, pid, color); // startEmptyTimer delega a EliminarProducto si no está focused
            return;
        }

        // Si escribió un valor válido -> cancelar eliminación si existiera
        clearEmptyTimer(el);

        let v = parseInt(el.value, 10);
        if (isNaN(v) || v < 1) {
            Swal.fire({
                icon: "warning",
                title: "Cantidad mínima",
                text: "No puedes pedir menos de 1 producto.",
                confirmButtonColor: "#3085d6"
            });
            el.value = 1;
            updateQuantity(pid, color, 1);
            return;
        }

        const row = findRow(pid, color);
        const stock = row ? parseInt(row.dataset.stock || '0', 10) : 0;
        if (v > stock) {
            Swal.fire({
                icon: "error",
                title: "Stock insuficiente",
                text: `Disponible: ${stock}`,
                confirmButtonColor: "#d33"
            });
            el.value = Math.max(1, stock);
            if (stock >= 1) updateQuantity(pid, color, stock);
            return;
        }

        updateQuantity(pid, color, v);
    });
});


/* ---------- INPUT HANDLING (reemplaza tu handler actual) ---------- */
document.querySelectorAll('.qty-input').forEach(input => {
    // debounce simple por input
    const debouncedMap = window._qtyDebounceMap || (window._qtyDebounceMap = new WeakMap());

    input.addEventListener('input', (ev) => {
        const el = ev.target;

        // si el campo está vacío, no disparamos la petición: el usuario probablemente está escribiendo
        if (el.value.trim() === '') {
            // opcional: podrías mostrar placeholder o dejarlo vacío
            // Cancelar cualquier debounce pendiente
            if (debouncedMap.has(el)) {
                clearTimeout(debouncedMap.get(el));
                debouncedMap.delete(el);
            }
            return;
        }

        // cancelar debounce anterior
        if (debouncedMap.has(el)) clearTimeout(debouncedMap.get(el));

        const t = setTimeout(() => {
            const pid = el.dataset.productId;
            const color = el.dataset.color ?? '';
            let v = parseInt(el.value || '0', 10);
            if (isNaN(v)) v = 0;

            // si el usuario escribió 0 o un número negativo -> forzar mínimo 1 y avisar
            if (v < 1) {
                Swal.fire({
                    icon: "warning",
                    title: "Cantidad mínima",
                    text: "No puedes pedir menos de 1 producto.",
                    confirmButtonColor: "#3085d6"
                });
                el.value = 1;
                updateQuantity(pid, color, 1);
                return;
            }

            // validar stock cliente
            const row = findRow(pid, color);
            const stock = row ? parseInt(row.dataset.stock || '0', 10) : 0;
            if (v > stock) {
                Swal.fire({
                    icon: "error",
                    title: "Stock insuficiente",
                    text: `No hay suficiente stock. Cantidad disponible: ${stock}`,
                    confirmButtonColor: "#d33"
                });
                // ajustar al stock
                el.value = Math.max(1, stock);
                if (stock >= 1) updateQuantity(pid, color, stock);
                return;
            }

            // todo OK -> actualizar
            el.value = v;
            updateQuantity(pid, color, v);
        }, 600);

        debouncedMap.set(el, t);
    });

    // blur: cuando el usuario sale del campo, si quedó vacío forzamos 1 y actualizamos
    input.addEventListener('blur', (ev) => {
        const el = ev.target;
        const pid = el.dataset.productId;
        const color = el.dataset.color ?? '';
        if (el.value.trim() === '') {
            // si quedó vacío, poner 1 y actualizar
            Swal.fire({
                icon: "info",
                title: "Cantidad ajustada",
                text: "El campo estaba vacío. Se estableció la cantidad mínima (1).",
                confirmButtonColor: "#3085d6",
                timer: 1500,
                showConfirmButton: false
            });
            el.value = 1;
            updateQuantity(pid, color, 1);
            return;
        }

        // Si escribió un número inválido o <1 validamos también
        let v = parseInt(el.value || '0', 10);
        if (isNaN(v) || v < 1) {
            Swal.fire({
                icon: "warning",
                title: "Cantidad mínima",
                text: "No puedes pedir menos de 1 producto.",
                confirmButtonColor: "#3085d6"
            });
            el.value = 1;
            updateQuantity(pid, color, 1);
            return;
        }

        // Validar stock al blur (por si cambió mientras editaba)
        const row = findRow(pid, color);
        const stock = row ? parseInt(row.dataset.stock || '0', 10) : 0;
        if (v > stock) {
            Swal.fire({
                icon: "error",
                title: "Stock insuficiente",
                text: `No hay suficiente stock. Cantidad disponible: ${stock}`,
                confirmButtonColor: "#d33"
            });
            el.value = Math.max(1, stock);
            if (stock >= 1) updateQuantity(pid, color, stock);
            return;
        }

        // si todo OK -> actualizar (esto evita casos en que el usuario no disparó el debounce)
        updateQuantity(pid, color, v);
    });
});


/* ---------- AJAX: updateQuantity ---------- */
async function updateQuantity(productId, color, qty) {
    const row = findRow(productId, color);
    if (!row) {
        console.warn('fila no encontrada para', productId, color);
        return;
    }

    const stock = parseInt(row.dataset.stock || '0', 10);
    if (qty > stock) {
        qty = stock;
        showAlertModal(`No hay suficiente stock. Stock disponible: ${stock}`);
    }

    setRowDisabled(row, true);

    try {
        const res = await fetch(updateUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ product_id: Number(productId), color: String(color), quantity: Number(qty) })
        });

        if (res.status === 409) {
            const txt = await res.json().catch(() => null);
            const message = (txt && txt.message) ? txt.message : 'Stock insuficiente';
            const available = txt && typeof txt.available !== 'undefined' ? txt.available : null;
            if (available !== null && row) {
                row.dataset.stock = available;
                const stockSpan = row.querySelector('.stock-value');
                if (stockSpan) stockSpan.textContent = available;
            }
            showAlertModal(message);
            return;
        }

        if (!res.ok) {
            let txt = await res.text().catch(() => '');
            throw new Error('HTTP ' + res.status + ' - ' + txt);
        }

        const data = await res.json();
        if (!data.ok) throw new Error(data.message || 'Respuesta no OK');

        const cartCountEl = document.getElementById('cart-count');
        if (cartCountEl && typeof data.count !== 'undefined') {
            cartCountEl.textContent = (data.count || 0) + ' items';
        }

        const subtotalEl = document.getElementById('subtotal');
        if (subtotalEl) {
            subtotalEl.textContent = displayFormatted(data.subtotal_selected ?? data.subtotal ?? 0);
        }

        const lineTotalEl = row.querySelector('.line-total');
        if (lineTotalEl) {
            if (typeof data.line_total !== 'undefined' && data.line_total !== null) {
                lineTotalEl.textContent = displayFormatted(data.line_total);
            } else {
                const price = parseNumberFromText(row.dataset.price ?? 0);
                lineTotalEl.textContent = displayFormatted(price * qty);
            }
        }

        if (qty <= 0) {
            row.remove();
        }
    } catch (err) {
        console.error('Update quantity failed:', err);
        alert('No se pudo actualizar la cantidad. Intenta de nuevo.');
    } finally {
        setRowDisabled(row, false);
    }
}

/* ---------- AJAX: toggleSelected (checkbox) ---------- */
document.addEventListener('change', async function (e) {
    const el = e.target;
    if (!el.classList || !el.classList.contains('item-selected')) return;

    const productId = el.dataset.productId;
    const color = el.dataset.color ?? '';
    const selected = !!el.checked;

    el.disabled = true;
    const row = findRow(productId, color);

    try {
        const res = await fetch(toggleUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ product_id: Number(productId), color: String(color), selected: selected })
        });
        if (!res.ok) {
            let txt = await res.text().catch(()=>'');
            console.error('toggleSelected http error', res.status, txt);
            throw new Error('HTTP ' + res.status);
        }
        const json = await res.json();
        if (!json.ok) throw new Error(json.message || 'Server returned ok=false');

        const cartCountEl = document.getElementById('cart-count');
        if (cartCountEl && typeof json.count !== 'undefined') {
            cartCountEl.textContent = (json.count || 0) + ' items';
        }

        const subtotalEl = document.getElementById('subtotal');
        if (subtotalEl) subtotalEl.textContent = displayFormatted(json.subtotal_selected ?? json.subtotal ?? 0);

        if (row) {
            row.classList.toggle('opacity-50', !selected);
            row.classList.toggle('text-decoration-line-through', !selected);
        }
    } catch (err) {
        console.error('toggleSelected error', err);
        alert('No se pudo guardar la selección. Intenta de nuevo.');
        el.checked = !selected;
    } finally {
        el.disabled = false;
    }
});

/* ---------- AJAX: remove ---------- */
function confirmRemove(productId, color) {
    showConfirmModal('¿Eliminar este producto del carrito?', async () => {
        await removeFromCart(productId, color);
    });
}

async function removeFromCart(productId, color) {
    const row = findRow(productId, color);
    if (row) setRowDisabled(row, true);

    try {
        const res = await fetch(removeUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ product_id: Number(productId), color: String(color) })
        });
        if (!res.ok) {
            let txt = await res.text().catch(()=>'');
            throw new Error('HTTP ' + res.status + ' - ' + txt);
        }
        const data = await res.json();
        if (!data.ok) throw new Error(data.message || 'Server returned ok=false');

        if (row) row.remove();

        const cartCountEl = document.getElementById('cart-count');
        if (cartCountEl && typeof data.count !== 'undefined') {
            cartCountEl.textContent = (data.count || 0) + ' items';
        }

        const subtotalEl = document.getElementById('subtotal');
        if (subtotalEl) subtotalEl.textContent = displayFormatted(data.subtotal_selected ?? data.subtotal ?? 0);
    } catch (err) {
        console.error('removeFromCart error', err);
        alert('No se pudo eliminar el producto.');
        if (row) setRowDisabled(row, false);
    }
}

/* ---------- AJAX: clear cart ---------- */
function confirmClear() {
    showConfirmModal('¿Vaciar todo el carrito?', async () => {
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
            if (!data.ok) throw new Error(data.message || 'Server returned ok=false');

            document.querySelectorAll('.cart-row').forEach(r => r.remove());
            const cartCountEl = document.getElementById('cart-count');
            if (cartCountEl) cartCountEl.textContent = '0 items';
            const subtotalEl = document.getElementById('subtotal');
            if (subtotalEl) subtotalEl.textContent = displayFormatted(0);
        } catch (err) {
            console.error('clear cart error', err);
            alert('No se pudo vaciar el carrito.');
        }
    });
}

/* ---------- Modal helper ---------- */
function showConfirmModal(message, onConfirm) {
    const modalEl = document.getElementById('confirmModal');
    const modalBody = document.getElementById('confirmModalBody');
    const confirmBtn = document.getElementById('confirmModalBtn');
    modalBody.textContent = message;

    const bsModal = new bootstrap.Modal(modalEl);
    confirmBtn.onclick = async function () {
        confirmBtn.disabled = true;
        try {
            await onConfirm();
        } finally {
            confirmBtn.disabled = false;
            bsModal.hide();
        }
    };
    bsModal.show();
}
function showAlertModal(message) {
    showConfirmModal(message, async () => {});
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>