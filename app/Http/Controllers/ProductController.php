<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Api\Admin\AdminApi;

class ProductController extends Controller
{
    /* =========================================================
    | HOME
    ========================================================= */
    public function home()
    {
        $products = Product::where('stock', '>', 0)
            ->where('status', 'activo')
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('products'));
    }

    /* =========================================================
    | INDEX (CATÁLOGO)
    ========================================================= */
    public function index(Request $request)
    {
        if ($request->boolean('debug')) {
            return Product::where('status', 'activo')->get();
        }

        $products = Product::where('status', 'activo')
            ->where('stock', '>', 0)
            ->latest()
            ->paginate(12)
            ->withQueryString();

        // ✅ SIEMPRE enviar categorías
        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('products.index', compact('products', 'categories'));
    }

    /* =========================================================
    | SHOW
    ========================================================= */
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->boolean('debug')) {
            return $product;
        }

        return view('products.show', compact('product'));
    }

    /* =========================================================
    | BÚSQUEDA Y FILTROS (CATÁLOGO)
    ========================================================= */
    public function searchProducts(Request $request)
    {
        $query = Product::where('status', 'activo')
            ->where('stock', '>', 0);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->search}%")
                  ->orWhere('title', 'LIKE', "%{$request->search}%")
                  ->orWhere('description', 'LIKE', "%{$request->search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('price_order')) {
            $query->orderBy('price', $request->price_order);
        } else {
            $query->latest();
        }

        $products = $query->paginate(12)->withQueryString();

        // ✅ OBLIGATORIO para la vista
        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('products.index', compact('products', 'categories'));
    }

    /* =========================================================
    | TABLA ADMIN
    ========================================================= */
    public function tablaProductos(Request $request)
    {
        $productsQuery = Product::query();

        if ($request->filled('q')) {
            $productsQuery->where(function ($q) use ($request) {
                $q->where('name', $request->q)
                  ->orWhere('title', $request->q)
                  ->orWhere('description', $request->q)
                  ->orWhere('category', $request->q);
            });
        }

        if ($request->filled('category')) {
            $productsQuery->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $productsQuery->where('status', $request->status);
        }

        $products = $productsQuery
            ->latest()
            ->paginate(8)
            ->withQueryString();

        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('products.tabla-productos', compact('products', 'categories'));
    }

    /* =========================================================
    | CREATE
    ========================================================= */
    public function create()
    {
        return view('products.create');
    }

    /* =========================================================
    | STORE
    ========================================================= */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'contentProductDescription' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category'    => 'required|in:camisas,gorras,cafe',
            'status'      => 'required|in:activo,inactivo',
            'photo'       => 'nullable|image|max:4096',
            'colores'     => 'nullable|array',
            'colores.*'   => 'string|max:50',
        ]);

        $data['colores'] = array_values(array_unique(array_filter($request->colores ?? [])));

        if ($request->hasFile('photo')) {
            $upload = (new UploadApi())->upload(
                $request->file('photo')->getRealPath(),
                ['folder' => 'productos']
            );

            $data['photo'] = $upload['secure_url'];
            $data['photo_public_id'] = $upload['public_id'];
        }

        Product::create($data);

        return redirect()
            ->route('admin.Tabla-productos')
            ->with('success', 'Producto creado correctamente');
    }

    /* =========================================================
    | EDIT
    ========================================================= */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /* =========================================================
    | UPDATE
    ========================================================= */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'contentProductDescription' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category'    => 'required|in:camisas,gorras,cafe',
            'status'      => 'required|in:activo,inactivo',
            'photo'       => 'nullable|image|max:4096',
            'colores'     => 'nullable|array',
            'colores.*'   => 'string|max:50',
        ]);

        $data['colores'] = array_values(array_unique(array_filter($request->colores ?? [])));

        if ($request->hasFile('photo')) {

            if ($product->photo_public_id) {
                (new AdminApi())->deleteAssets([$product->photo_public_id]);
            }

            $upload = (new UploadApi())->upload(
                $request->file('photo')->getRealPath(),
                ['folder' => 'productos']
            );

            $data['photo'] = $upload['secure_url'];
            $data['photo_public_id'] = $upload['public_id'];
        }

        $product->update($data);

        return redirect()
            ->route('admin.Tabla-productos')
            ->with('success', 'Producto actualizado correctamente');
    }

    /* =========================================================
    | DESTROY
    ========================================================= */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->photo_public_id) {
            (new AdminApi())->deleteAssets([$product->photo_public_id]);
        }

        $product->delete();

        return back()->with('success', 'Producto eliminado');
    }

    /* =========================================================
    | CARRITO
    ========================================================= */
    public function cantidadProductosCarrito()
    {
        return response()->json([
            'cantidad' => count(session('carrito', []))
        ]);
    }
}
