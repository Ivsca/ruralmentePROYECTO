<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

// para que funcionen las img
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Api\Admin\AdminApi;


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
        // Inputs
        $q = $request->input('q');
        $category = $request->input('category');
        $status = $request->input('status');
        $price_min = $request->input('price_min');
        $price_max = $request->input('price_max');
        $stock_min = $request->input('stock_min');
        $stock_max = $request->input('stock_max');

        // Query base
        $productsQuery = Product::query();

        // Buscador general (campo q)
        if ($q) {
            $like = "%{$q}%";
            $productsQuery->where(function($query) use ($like, $q) {
                $query->where('name', 'like', $like)
                    ->orWhere('title', 'like', $like)
                    ->orWhere('description', 'like', $like)
                    ->orWhere('contentProductDescription', 'like', $like)
                    ->orWhere('color', 'like', $like)
                    ->orWhere('category', 'like', $like)
                    ->orWhere('status', 'like', $like)
                    ->orWhere('price', $q)
                    ->orWhere('stock', $q);
                    ->orWhere('status', 'like', $like);

                // Búsqueda por valores numéricos si el input es numérico
                if (is_numeric($q)) {
                    $query->orWhere('price', $q)
                          ->orWhere('stock', $q);
                }
            });
        }

        // Filtros específicos (aplican sobre el resultado del buscador si existe)
        if ($category) {
            $productsQuery->where('category', $category);
        }

        if ($status) {
            $productsQuery->where('status', $status);
        }

        if ($price_min !== null && $price_min !== '') {
            if (is_numeric($price_min)) {
                $productsQuery->where('price', '>=', $price_min);
            }
        }

        if ($price_max !== null && $price_max !== '') {
            if (is_numeric($price_max)) {
                $productsQuery->where('price', '<=', $price_max);
            }
        }

        if ($stock_min !== null && $stock_min !== '') {
            if (is_numeric($stock_min)) {
                $productsQuery->where('stock', '>=', $stock_min);
            }
        }

        if ($stock_max !== null && $stock_max !== '') {
            if (is_numeric($stock_max)) {
                $productsQuery->where('stock', '<=', $stock_max);
            }
        }

        // Obtener lista de categorías únicas para el select (para la vista)
        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        // Paginación: 5 por página, y preserva query string al paginar
        $products = $productsQuery->orderBy('created_at', 'desc')
                                  ->paginate(5)
                                  ->withQueryString();

        // Retornamos a la vista con products y las categorías para el select
        return view('products.Tabla-productos', compact('products', 'categories'));
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

            'name'                      => 'required|string|max:255',
            'title'                     => 'nullable|string|max:255',
            'description'               => 'nullable|string|max:255',
            'contentProductDescription' => 'nullable|string',
            'price'                     => 'required|numeric|min:0',
            'stock'                     => 'required|integer|min:0',
            'color'                     => 'nullable|string|max:50',
            'category'                  => 'required|in:camisas,gorras,cafe',
            'status'                    => 'required|in:activo,inactivo',
            'photo'                     => 'nullable|image|max:4096',
        ]);

        // Cloudinary config (best-effort check)
        $cloudinaryUrl = config('filesystems.disks.cloudinary.url') ?? env('CLOUDINARY_URL');
        if (empty($cloudinaryUrl) || !is_string($cloudinaryUrl)) {
            throw new \RuntimeException("Cloudinary no está configurado correctamente. Verifica CLOUDINARY_URL en .env y ejecuta php artisan config:clear");
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            if (!$file->isValid()) {
                throw new \RuntimeException("El archivo subido no es válido (upload error).");
            }

            $randomPublicId = 'producto_' . Str::uuid()->toString();

            $path = $file->getRealPath() ?: $file->path();
            $storedTemp = false;
            $tempStorePath = null;

            if (!$path || !file_exists($path) || !is_readable($path)) {
                $tempStorePath = $file->store('tmp', 'local'); // storage/app/tmp/xxxx
                if (!$tempStorePath) {
                    throw new \RuntimeException("No se pudo escribir un archivo temporal para la subida.");
                }
                $path = storage_path('app/' . $tempStorePath);
                $storedTemp = true;
            }

            if (!file_exists($path) || !is_readable($path)) {
                Log::error('Archivo temporal inaccesible antes de subir a Cloudinary', [
                    'path' => $path,
                    'exists' => file_exists($path),
                    'readable' => is_readable($path),
                ]);
                if ($storedTemp && $tempStorePath) {
                    Storage::disk('local')->delete($tempStorePath);
                }
                throw new \RuntimeException("Archivo temporal inaccesible: {$path}");
            }

            Log::info('Preparando upload a Cloudinary', ['path' => $path, 'size' => @filesize($path) ?: 0, 'cloudinary_url' => $cloudinaryUrl]);

            try {
                // Ensure UploadApi exists (modern SDK)
                if (!class_exists(UploadApi::class)) {
                    throw new \RuntimeException("Cloudinary UploadApi class not found. Run: composer require cloudinary/cloudinary_php");
                }

                $uploader = new UploadApi();

                $result = $uploader->upload($path, [
                    'folder'      => 'productos',
                    'public_id'   => $randomPublicId,
                    'overwrite'   => false,
                    'resource_type'=> 'image',
                ]);

                // Normalize result across SDK versions
                $secureUrl = null;
                $publicId  = null;

                // array-like
                if (is_array($result) || $result instanceof \ArrayAccess) {
                    $secureUrl = $result['secure_url'] ?? $result['url'] ?? null;
                    $publicId  = $result['public_id'] ?? $result['publicId'] ?? null;
                } elseif (is_object($result)) {
                    // ApiResponse has get() in some versions
                    if (method_exists($result, 'get')) {
                        try {
                            $secureUrl = $result->get('secure_url') ?? $result->get('url') ?? null;
                            $publicId  = $result->get('public_id') ?? $result->get('publicId') ?? null;
                        } catch (\Throwable $inner) {
                            Log::debug('Cloudinary ApiResponse get() failed', ['error' => $inner->getMessage()]);
                        }
                    }

                    // toArray fallback
                    if (empty($secureUrl) && method_exists($result, 'toArray')) {
                        try {
                            $arr = $result->toArray();
                            $secureUrl = $arr['secure_url'] ?? $arr['url'] ?? $secureUrl;
                            $publicId  = $arr['public_id'] ?? $arr['publicId'] ?? $publicId;
                        } catch (\Throwable $inner) {
                            //
                        }
                    }

                    // final attempt: public properties or cast
                    $secureUrl = $secureUrl ?: ($result->secure_url ?? $result->url ?? null);
                    $publicId  = $publicId  ?: ($result->public_id ?? $result->publicId ?? null);
                }

            } catch (\Throwable $e) {
                Log::error('Error subiendo a Cloudinary (FULL): ' . $e->getMessage(), [
                    'exception_message' => $e->getMessage(),
                    'exception_trace' => $e->getTraceAsString(),
                    'cloudinary_url' => $cloudinaryUrl,
                    'path' => $path,
                ]);

                if ($storedTemp && $tempStorePath) {
                    Storage::disk('local')->delete($tempStorePath);
                }

                if (app()->environment('local')) {
                    throw $e;
                }

                throw new \RuntimeException("Error al subir la imagen a Cloudinary. Revisa logs para más detalles.");
            }

            if (empty($secureUrl)) {
                Log::error('Cloudinary upload no devolvió URL segura', ['result' => $result ?? null]);
                if ($storedTemp && $tempStorePath) {
                    Storage::disk('local')->delete($tempStorePath);
                }
                throw new \RuntimeException("Cloudinary no devolvió URL segura tras la subida.");
            }

            $data['photo'] = $secureUrl;
            $data['photo_public_id'] = $publicId;

            if ($storedTemp && $tempStorePath) {
                Storage::disk('local')->delete($tempStorePath);
            }
        }

        Product::create($data);

        return redirect()
            ->route('Tabla-productos')
            ->with('success', 'Producto creado correctamente');
    }

    /**
     * Mostrar formulario de edición
     */
    // Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        // Compute photo URL: if it's already an absolute URL (Cloudinary secure_url) use it directly,
        // otherwise assume it's a storage path and create an asset() URL.
        $photoUrl = null;
        if (!empty($product->photo)) {
            $photoUrl = (Str::startsWith($product->photo, ['http://', 'https://']))
                ? $product->photo
                : asset('storage/' . ltrim($product->photo, '/'));
        }

        // Pass route + method so the blade can be reused for create/edit
        $route  = route('products.update', $product->id); // adjust route name if different
        $method = 'PUT';
        $title  = 'Editar producto';

        return view('products.edit', compact('product', 'photoUrl', 'route', 'method', 'title'));
    }

    /**
     * Actualizar producto
     */
    public function update(Request $request, $id)
    // Handle update
   public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate
        $validated = $request->validate([
            'name'                      => 'required|string|max:255',
            'title'                     => 'nullable|string|max:255',
            'description'               => 'nullable|string|max:255',
            'contentProductDescription' => 'nullable|string',
            'price'                     => 'required|numeric|min:0',
            'stock'                     => 'required|integer|min:0',
            'color'                     => 'nullable|string|max:50',
            'category'                  => 'required|in:camisas,gorras,cafe',
            'status'                    => 'required|in:activo,inactivo',
            'photo'                     => 'nullable|image|max:4096',
            'remove_photo'              => 'nullable|in:0,1',
        ]);

        // Prepare data to save (exclude file & remove flag)
        $saveData = $request->only([
            'name', 'title', 'description', 'contentProductDescription',
            'price', 'stock', 'color', 'category', 'status'
        ]);

        // Optional: check Cloudinary available
        $cloudinaryUrl = config('filesystems.disks.cloudinary.url') ?? env('CLOUDINARY_URL');
        if (empty($cloudinaryUrl) || !is_string($cloudinaryUrl)) {
            Log::warning('Cloudinary not configured when updating product', ['product_id' => $product->id]);
            // continue, but uploads/deletes will fail if Cloudinary not configured
        }

        // 1) Remove existing image if user asked
        if ($request->input('remove_photo') === '1') {
            if (!empty($product->photo_public_id)) {
                try {
                    $admin = new AdminApi();
                    // deleteAssets returns info; include resource_type for reliability
                    $response = $admin->deleteAssets([$product->photo_public_id], ['resource_type' => 'image']);
                    Log::info('Cloudinary deleteAssets response (remove_photo)', ['resp' => $response, 'product_id' => $product->id]);
                } catch (\Throwable $e) {
                    Log::error("Error deleting previous Cloudinary asset (remove_photo): " . $e->getMessage(), ['product_id' => $product->id]);
                    // continue — don't block user update because of delete failure
                }
            }
            $saveData['photo'] = null;
            $saveData['photo_public_id'] = null;
        }

        // 2) Upload new photo if provided
        if ($request->hasFile('photo')) {
            // Delete previous image first (to avoid orphaned files)
            if (!empty($product->photo_public_id)) {
                try {
                    $admin = new AdminApi();
                    $resp = $admin->deleteAssets([$product->photo_public_id], ['resource_type' => 'image']);
                    Log::info('Cloudinary deleteAssets response (replace)', ['resp' => $resp, 'product_id' => $product->id]);
                } catch (\Throwable $e) {
                    Log::error("Error deleting previous Cloudinary asset (replace): " . $e->getMessage(), ['product_id' => $product->id]);
                    // continue — still attempt upload
                }
            }

            $file = $request->file('photo');
            if (!$file->isValid()) {
                return redirect()->back()->withErrors(['photo' => 'El archivo subido no es válido.']);
            }

            $publicId = 'producto_' . Str::uuid()->toString();
            $path = $file->getRealPath() ?: $file->path();

            if (!class_exists(UploadApi::class)) {
                Log::error('Cloudinary UploadApi class not found. Run: composer require cloudinary/cloudinary_php');
                return redirect()->back()->withErrors(['photo' => 'Uploader no disponible en el servidor.']);
            }

            try {
                $uploader = new UploadApi();
                $result = $uploader->upload($path, [
                    'folder'        => 'productos',
                    'public_id'     => $publicId,
                    'overwrite'     => true,
                    'resource_type' => 'image',
                ]);
            } catch (\Throwable $e) {
                Log::error('Cloudinary upload failed: ' . $e->getMessage(), ['product_id' => $product->id]);
                return redirect()->back()->withErrors(['photo' => 'Error subiendo la imagen. Revisa logs.']);
            }

            // Normalize result
            $secureUrl = null;
            $publicIdResult = null;

            if (is_array($result) || $result instanceof \ArrayAccess) {
                $secureUrl = $result['secure_url'] ?? $result['url'] ?? null;
                $publicIdResult = $result['public_id'] ?? $result['publicId'] ?? null;
            } elseif (is_object($result)) {
                if (method_exists($result, 'get')) {
                    try {
                        $secureUrl = $result->get('secure_url') ?? $result->get('url') ?? null;
                        $publicIdResult = $result->get('public_id') ?? $result->get('publicId') ?? null;
                    } catch (\Throwable $inner) {
                        Log::debug('Cloudinary ApiResponse get() failed: ' . $inner->getMessage());
                    }
                }
                $secureUrl = $secureUrl ?: ($result->secure_url ?? $result->url ?? null);
                $publicIdResult = $publicIdResult ?: ($result->public_id ?? $result->publicId ?? null);
            }

            if (empty($secureUrl)) {
                Log::error('Cloudinary upload did not return secure_url', ['result' => $result ?? null]);
                return redirect()->back()->withErrors(['photo' => 'Cloudinary no devolvió URL tras la subida. Revisa logs.']);
            }

            $saveData['photo'] = $secureUrl;
            $saveData['photo_public_id'] = $publicIdResult ?? $publicId;
        }

        // 3) Persist only the fields we intend
        $product->update($saveData);

        return redirect()
            ->route('Tabla-productos')
            ->with('success', 'Producto actualizado correctamente');
    }


    /**
     * Eliminar producto
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        /** ---------------------------------------------------------
         * 1) ELIMINAR LA IMAGEN DE CLOUDINARY (si existe)
         * --------------------------------------------------------- */
        if (!empty($product->photo_public_id)) {
            try {
                $admin = new AdminApi();

                // deleteAssets recibe un array de public_ids
                $admin->deleteAssets([$product->photo_public_id]);

            } catch (\Throwable $e) {
                Log::error('Error eliminando imagen en Cloudinary (destroy): '.$e->getMessage(), [
                    'public_id' => $product->photo_public_id
                ]);
                // Continuamos, no bloquea la eliminación del producto
            }
        }

        /** ---------------------------------------------------------
         * 2) ELIMINAR EL PRODUCTO DE LA BD
         * --------------------------------------------------------- */
        $product->delete();

        return redirect()
            ->route('Tabla-productos')
            ->with('success', 'Producto eliminado correctamente');
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

}


