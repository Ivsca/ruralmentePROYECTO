<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Mostrar la página de inicio (HOME)
     */
    public function home()
    {
        // Obtener productos para mostrar en el home
        $products = Product::where('stock', '>', 0)
                          ->orderBy('created_at', 'desc')
                          ->take(3)
                          ->get();
        
        return view('welcome', compact('products'));
    }
    
    /**
     * Mostrar todos los productos (lista completa)
     * PARA: /productos y /productos-vista
     */
    public function index(Request $request)
    {
        // Si se solicita debug, devolver JSON
        if ($request->has('debug') && $request->debug) {
            $products = Product::select('id','name','title','description','price','stock','photo')->get();
            return response()->json($products);
        }
        
        // Para vista normal, mostrar con paginación
        $products = Product::where('stock', '>', 0)
                          ->orderBy('created_at', 'desc')
                          ->paginate(12);
        
        // Puedes usar la misma vista para ambas rutas o diferentes
        // Si tienes products.index y products.mis-products, decide cuál usar
        return view('products.index', compact('products'));
        // O si prefieres mantener separado:
        // return view('products.mis-products', compact('products'));
    }
    
    /**
     * Mostrar detalles de un producto
     */
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // Si se solicita debug, devolver JSON
        if ($request->has('debug') && $request->debug) {
            return response()->json($product);
        }
        
        return view('products.show', compact('product'));
    }

    /**
     * Tabla de productos para administración
     */
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
                    ->orWhere('price', $q)
                    ->orWhere('stock', $q);
            });
        }

        $products = $productsQuery->orderBy('created_at', 'desc')->get();

        return view('products.Tabla-productos', compact('products'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Guardar producto
     */
    public function store(Request $request)
    {
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
        ]);

        Product::create($data);

        return redirect()
            ->route('Tabla-productos')
            ->with('success', 'Producto creado correctamente');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Actualizar producto
     */
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

    /**
     * Eliminar producto
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('Tabla-productos')->with('success', 'Producto eliminado');
    }

    /**
     * Obtener productos destacados para el home (si lo necesitas desde otra vista)
     */
    public function featuredProducts()
    {
        $products = Product::where('stock', '>', 0)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        return $products;
    }
}