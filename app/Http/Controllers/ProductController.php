<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::select('id','name','title','description','price','stock','photo')->get();

        if ($request->has('debug') && $request->debug) {
            return response()->json($products);
        }

        return view('products.mis-products', compact('products'));
    }

    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->has('debug') && $request->debug) {
            return response()->json($product);
        }

        return view('products.show', compact('product'));
    }

    public function tablaProductos(Request $request)
    {
        $q = $request->input('q');

        $productsQuery = Product::query();

        if ($q) {
            $productsQuery->where(function($query) use ($q) {
                $like = "%{$q}%";
                $query->where('name', 'like', $like)
                    ->orWhere('title', 'like', $like)
                    ->orWhere('description', 'like', $like)
                    ->orWhere('contentProductDescription', 'like', $like)
                    ->orWhere('color', 'like', $like)
                    ->orWhere('category', 'like', $like)
                    ->orWhere('status', 'like', $like)
                    // Si quieres buscar por precio/stock numéricos exactos:
                    ->orWhere('price', $q)
                    ->orWhere('stock', $q);
            });
        }

        $products = $productsQuery->orderBy('created_at', 'desc')->get();

        return view('products.Tabla-productos', compact('products'));
    }


    // Mostrar formulario de creación
    public function create()
    {
        return view('products.create');
    }

    // Guardar producto
    public function store(Request $request)
    {
        // Validación sólida
        $data = $request->validate([
            'name'                     => 'required|string|max:255',
            'title'                    => 'nullable|string|max:255',
            'description'              => 'nullable|string|max:255',
            'contentProductDescription'=> 'nullable|string',
            'price'                    => 'required|numeric|min:0',
            'stock'                    => 'required|integer|min:0',
            'color'                    => 'nullable|string|max:50',
            'category'                 => 'required|in:camisas,gorras,cafe',
            'status'                   => 'required|in:activo,inactivo',
            // Para ahora NO procesaremos imagen
            // 'photo' => 'nullable|image|max:4096'
        ]);

        // Crear registro sin imagen por ahora
        Product::create($data);

        return redirect()
            ->route('Tabla-productos')
            ->with('success', 'Producto creado correctamente');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }


    // Eliminar
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('Tabla-productos')->with('success', 'Producto eliminado');
    }
}


