@include('products._form', [
    'title' => 'Editar Producto',
    'route' => route('products.update', $product->id),
    'method' => 'PUT',
    'product' => $product
])
