@extends('layouts.app')

@section('title', 'Lista de productos')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Lista de productos</h1>

    {{-- Formulario de búsqueda/filtros (mantiene valores con request()->input) --}}
    <form class="row g-2 mb-4" method="GET" action="{{ route('Tabla-productos') }}">
        <div class="col-md-4">
            <input type="text" name="q" class="form-control" placeholder="Buscar (coincidencia exacta)" value="{{ request()->input('q') }}">
        </div>

        <div class="col-md-2">
            <select name="category" class="form-select">
                <option value="">Todas las categorías</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request()->input('category') == $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">Todos los estados</option>
                <option value="active" {{ request()->input('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request()->input('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="col-md-2">
            <input type="number" name="price_min" class="form-control" placeholder="Precio min" value="{{ request()->input('price_min') }}">
        </div>

        <div class="col-md-2">
            <input type="number" name="price_max" class="form-control" placeholder="Precio max" value="{{ request()->input('price_max') }}">
        </div>

        <div class="col-12 d-flex gap-2 mt-2">
            <button class="btn btn-primary">Filtrar</button>
            <a href="{{ route('Tabla-productos') }}" class="btn btn-outline-secondary">Limpiar</a>
        </div>
    </form>

    {{-- Grid de productos --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    @if($product->photo)
                        <img src="{{ Storage::url($product->photo) }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $product->name }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                            <span class="text-muted">Sin imagen</span>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted mb-2" style="flex:1;">
                            {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div>
                                <div class="fw-bold">$ {{ number_format($product->price, 0, ',', '.') }}</div>
                                <small class="text-muted">Stock: {{ $product->stock }}</small>
                            </div>

                            <div class="d-flex flex-column">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary mb-2">Ver más</a>

                                <form method="POST" action="{{ route('carrito.add', $product->id) }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="btn btn-sm btn-success">Agregar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info">No hay productos que coincidan.</div>
            </div>
        @endforelse
    </div>

    {{-- Paginación (Bootstrap 5) --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
