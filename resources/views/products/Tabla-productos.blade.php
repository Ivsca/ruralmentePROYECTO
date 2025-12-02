<x-app-layout>

<!-- CSS: quita transiciones/transformaciones/animaciones de los botones del modal -->
<style>
/* (Tu CSS SweetAlert2 tal y como lo tenías) */
.swal2-styled,
.swal2-confirm,
.swal2-cancel,
.swal2-delete-btn,
.swal2-cancel-btn {
    transition: none !important;
    -webkit-transition: none !important;
    transform: none !important;
    -webkit-transform: none !important;
    animation: none !important;
    -webkit-animation: none !important;
    box-shadow: none !important;
    opacity: 1 !important;
}
.swal2-styled:hover,
.swal2-styled:focus,
.swal2-styled:active,
.swal2-confirm:hover,
.swal2-confirm:focus,
.swal2-confirm:active,
.swal2-cancel:hover,
.swal2-cancel:focus,
.swal2-cancel:active,
.swal2-delete-btn:hover,
.swal2-delete-btn:focus,
.swal2-delete-btn:active,
.swal2-cancel-btn:hover,
.swal2-cancel-btn:focus,
.swal2-cancel-btn:active {
    transition: none !important;
    -webkit-transition: none !important;
    transform: none !important;
    -webkit-transform: none !important;
    animation: none !important;
    -webkit-animation: none !important;
    box-shadow: none !important;
    outline: none !important;
}
.swal2-delete-btn {
    background-color: #d33 !important;
    color: #fff !important;
    border-radius: 6px !important;
    border: none !important;
}
.swal2-cancel-btn {
    background-color: #3085d6 !important;
    color: #fff !important;
    border-radius: 6px !important;
    border: none !important;
}
</style>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🛒 Gestión de Productos</h2>

        <!-- Form: buscador + filtros -->
        <form action="{{ route('Tabla-productos') }}" method="GET" class="row g-2 align-items-center" role="search">
            <div class="col-auto">
                <input name="q" value="{{ request('q') }}" class="form-control form-control-sm" type="search" placeholder="Buscar por nombre, título, descripción, color..." aria-label="Buscar">
            </div>

            <div class="col-auto">
                <select name="category" class="form-select form-select-sm">
                    <option value="">Todas las categorías</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ ucfirst($cat) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-auto">
                <select name="status" class="form-select form-select-sm">
                    <option value="">Todos estados</option>
                    <option value="activo" {{ request('status') === 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ request('status') === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="col-auto">
                <input name="price_min" value="{{ request('price_min') }}" class="form-control form-control-sm" style="width:100px" type="number" step="0.01" placeholder="Precio min">
            </div>
            <div class="col-auto">
                <input name="price_max" value="{{ request('price_max') }}" class="form-control form-control-sm" style="width:100px" type="number" step="0.01" placeholder="Precio max">
            </div>

            <div class="col-auto">
                <input name="stock_min" value="{{ request('stock_min') }}" class="form-control form-control-sm" style="width:90px" type="number" placeholder="Stock min">
            </div>
            <div class="col-auto">
                <input name="stock_max" value="{{ request('stock_max') }}" class="form-control form-control-sm" style="width:90px" type="number" placeholder="Stock max">
            </div>

            <div class="col-auto d-flex">
                <button class="btn btn-outline-primary btn-sm me-2" type="submit">Buscar</button>
                @if(request()->anyFilled(['q','category','status','price_min','price_max','stock_min','stock_max']))
                    <a href="{{ route('Tabla-productos') }}" class="btn btn-link btn-sm ms-2">Limpiar</a>
                @endif
            </div>
        </form>

        <a href="{{ route('products.create') }}" class="btn btn-success shadow-sm">
            + Agregar Producto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Descripción Larga</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Color</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Creado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                    <tr>
                        {{-- CONTADOR global que respeta paginación --}}
                        <td class="fw-bold">{{ $products->firstItem() + $loop->index }}</td>

                        <td>{{ $product->name }}</td>
                        <td>{{ $product->title }}</td>
                        <td class="text-muted" style="max-width:180px;">{{ \Illuminate\Support\Str::limit($product->description, 40) }}</td>
                        <td class="text-muted" style="max-width:200px;">{{ \Illuminate\Support\Str::limit($product->contentProductDescription, 50) }}</td>
                        <td class="fw-semibold text-success">${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->color }}</td>
                        <td><span class="badge bg-primary">{{ $product->category }}</span></td>
                        <td><span class="badge {{ $product->status === 'activo' ? 'bg-success' : 'bg-secondary' }}">{{ $product->status }}</span></td>
                        <td>{{ optional($product->created_at)->format('Y-m-d') }}</td>

                        <td class="text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>

                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $product->id }}">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="text-center py-4">
                            No se encontraron productos con esos criterios.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <div>
                Mostrando {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} de {{ $products->total() }} productos
            </div>

            <div>
                {{-- Paginación Bootstrap 5. withQueryString() ya preservó los filtros. --}}
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            let form = document.getElementById(`delete-form-${id}`);

            Swal.fire({
                title: "¿Eliminar producto?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
                customClass: {
                    confirmButton: "swal2-delete-btn",
                    cancelButton:  "swal2-cancel-btn"
                },
                buttonsStyling: true,
                focusConfirm: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });
    });
});
</script>

</x-app-layout>
