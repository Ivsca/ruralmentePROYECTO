@include('products._form', [
    'title' => 'Editar Producto',
    'route' => route('admin.products.update', $product->id),
    'method' => 'PUT',
    'product' => $product
])
