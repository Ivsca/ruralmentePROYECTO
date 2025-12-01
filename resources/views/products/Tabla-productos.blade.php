<x-app-layout>




<!-- CSS: quita transiciones/transformaciones/animaciones de los botones del modal -->
<style>
/* Selectores que cubren las clases principales de SweetAlert2 */
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
    box-shadow: none !important;     /* quita sombras que parecen "animar" */
    opacity: 1 !important;
}

/* Asegurar que hover/focus/active no reintroduzcan efectos */
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
    outline: none !important;        /* quita outline si no lo quieres */
}

/* Opcional: estilo personalizado para los botones si quieres colores */
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

    <!-- dentro de resources/views/products/Tabla-productos.blade.php (encabezado) -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🛒 Gestión de Productos</h2>

        <form action="{{ route('Tabla-productos') }}" method="GET" class="d-flex" role="search">
            <input
                name="q"
                value="{{ request('q') }}"
                class="form-control form-control-sm me-2"
                type="search"
                placeholder="Buscar por nombre, título, descripción, color, categoría..."
                aria-label="Buscar">
            <button class="btn btn-outline-primary btn-sm" type="submit">Buscar</button>
            @if(request()->has('q') && request('q') !== '')
                <a href="{{ route('Tabla-productos') }}" class="btn btn-link btn-sm ms-2">Limpiar</a>
            @endif
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
                    @php $counter = 1; @endphp

                    @foreach($products as $product)
                    <tr>
                        {{-- CONTADOR --}}
                        <td class="fw-bold">{{ $counter++ }}</td>

                        <td>{{ $product->name }}</td>

                        <td>{{ $product->title }}</td>

                        <td class="text-muted" style="max-width:180px;">
                            {{ Str::limit($product->description, 40) }}
                        </td>

                        <td class="text-muted" style="max-width:200px;">
                            {{ Str::limit($product->contentProductDescription, 50) }}
                        </td>

                        <td class="fw-semibold text-success">
                            ${{ number_format($product->price) }}
                        </td>

                        <td>{{ $product->stock }}</td>

                        <td>{{ $product->color }}</td>

                        <td>
                            <span class="badge bg-primary">
                                {{ $product->category }}
                            </span>
                        </td>

                        <td>
                            <span class="badge {{ $product->status === 'activo' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $product->status }}
                            </span>
                        </td>

                        <td>{{ $product->created_at->format('Y-m-d') }}</td>

                        <td class="text-center">

                            <a href="{{ route('products.edit', $product->id) }}"
                               class="btn btn-warning btn-sm me-2">
                                Editar
                            </a>

                            <form id="delete-form-{{ $product->id }}"
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        class="btn btn-danger btn-sm btn-delete"
                                        data-id="{{ $product->id }}">
                                    Eliminar
                                </button>

                            </form>



                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

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
                    confirmButton: "swal2-delete-btn", // clase sobre la que aplicamos 'transition: none'
                    cancelButton:  "swal2-cancel-btn"
                },
                buttonsStyling: true, // deja que SweetAlert2 aplique estilos base, pero nosotros anulamos transiciones
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
