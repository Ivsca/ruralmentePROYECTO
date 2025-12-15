<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // opcional, si instalaste el paquete

// Opcionales: se usan solo si están disponibles en el servidor
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Uploader;
use Cloudinary\Api\Admin\AdminApi;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::where('stock', '>', 0)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('welcome', compact('products'));
    }

    public function index(Request $request)
    {
        // --- DEBUG MODE -------------------------------------------------------
        if ($request->boolean('debug')) {

            // Solo productos con status = 'activo'
            $products = Product::where('status', 'activo')
                ->select('id','name','title','description','price','stock','photo')
                ->get();

            return response()->json($products);
        }

        // --- NORMAL MODE ------------------------------------------------------
        $products = Product::where('status', 'activo')   // solo activos
            ->where('stock', '>', 0)                    // con stock
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('products.index', compact('products'));
    }


    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->boolean('debug')) {
            return response()->json($product);
        }

        return view('products.show', compact('product'));
    }


    public function tablaProductos(Request $request)
    {
        $q = $request->input('q', null);
        $category = $request->input('category', null);
        $status = $request->input('status', null);
        $price_min = $request->input('price_min', null);
        $price_max = $request->input('price_max', null);
        $stock_min = $request->input('stock_min', null);
        $stock_max = $request->input('stock_max', null);

        $productsQuery = Product::query();

        if ($q !== null && $q !== '') {
            $productsQuery->where(function ($query) use ($q) {
                $query->where('name', $q)
                      ->orWhere('title', $q)
                      ->orWhere('description', $q)
                      ->orWhere('contentProductDescription', $q)
                      ->orWhere('category', $q)
                      ->orWhere('status', $q);

                if (is_numeric($q)) {
                    $query->orWhere('price', $q)
                          ->orWhere('stock', $q);
                }
            });
        }

        if ($category) $productsQuery->where('category', $category);
        if ($status) $productsQuery->where('status', $status);
        if (is_numeric($price_min)) $productsQuery->where('price', '>=', $price_min);
        if (is_numeric($price_max)) $productsQuery->where('price', '<=', $price_max);
        if (is_numeric($stock_min)) $productsQuery->where('stock', '>=', $stock_min);
        if (is_numeric($stock_max)) $productsQuery->where('stock', '<=', $stock_max);

        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $products = $productsQuery
            ->orderBy('created_at', 'desc')
            ->paginate(8)
            ->withQueryString();

        return view('products.tabla-productos', compact('products', 'categories'));
    }

    public function create()
    {
        return view('products.create');
    }

    /**
     * Guardar producto - soporta array 'colores' y subida a Cloudinary con fallback local
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                      => 'required|string|max:255',
            'title'                     => 'nullable|string|max:255',
            'description'               => 'nullable|string|max:255',
            'contentProductDescription' => 'nullable|string',
            'price'                     => 'required|numeric|min:0',
            'stock'                     => 'required|integer|min:0',
            'colores'                   => 'nullable|array',
            'colores.*'                 => 'nullable|string|max:50',
            'category'                  => 'required|in:camisas,gorras,cafe',
            'status'                    => 'required|in:activo,inactivo',
            'photo'                     => 'nullable|image|max:4096',
        ]);

        // Normalizar array de colores (trim, quitar vacíos, quitar duplicados)
        $rawColors = $request->input('colores', []);
        if (!is_array($rawColors)) $rawColors = [];
        $normalizedColors = array_values(array_unique(array_filter(array_map(function ($c) {
            return is_string($c) ? trim($c) : null;
        }, $rawColors))));
        $data['colores'] = $normalizedColors;

        // Manejo de la imagen: intentamos Cloudinary si está disponible, si no -> fallback local
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            if (!$file->isValid()) {
                return back()->withErrors(['photo' => 'El archivo subido no es válido.'])->withInput();
            }

            $randomPublicId = 'producto_' . Str::uuid()->toString();
            $path = $file->getRealPath() ?: $file->path();
            $storedTemp = false;
            $tempStorePath = null;

            // Si no hay path legible, guardamos temporalmente
            if (!$path || !file_exists($path) || !is_readable($path)) {
                $tempStorePath = $file->store('tmp', 'local');
                if (!$tempStorePath) {
                    Log::error('No se pudo crear archivo temporal para upload');
                } else {
                    $path = storage_path('app/' . $tempStorePath);
                    $storedTemp = true;
                }
            }

            // Preparar opciones de upload
            $uploadOptions = [
                'folder' => 'productos',
                'public_id' => $randomPublicId,
                'overwrite' => false,
                'resource_type' => 'image',
            ];

            $secureUrl = null;
            $publicId  = null;

            // Intentar usar Cloudinary SDK (varias alternativas)
            try {
                if (class_exists(\Cloudinary\Api\Upload\UploadApi::class)) {
                    // SDK moderno
                    $uploader = new \Cloudinary\Api\Upload\UploadApi();
                    $result = $uploader->upload($path, $uploadOptions);
                } elseif (class_exists(\Cloudinary\Uploader::class)) {
                    // SDK clásico
                    $result = \Cloudinary\Uploader::upload($path, $uploadOptions);
                } elseif (class_exists(\CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::class) || class_exists(\CloudinaryLabs\CloudinaryLaravel\Cloudinary::class)) {
                    // Si instalaste cloudinary-laravel, intenta facade
                    try {
                        $res = Cloudinary::upload($path, ['folder' => 'productos', 'public_id' => $randomPublicId]);
                        $result = $res;
                    } catch (\Throwable $e) {
                        $result = null;
                    }
                } else {
                    $result = null;
                }

                // Normalizar resultado si vino de Cloudinary
                if ($result) {
                    if (is_array($result) || $result instanceof \ArrayAccess) {
                        $secureUrl = $result['secure_url'] ?? $result['url'] ?? ($result['secureUrl'] ?? null);
                        $publicId  = $result['public_id'] ?? $result['publicId'] ?? null;
                    } elseif (is_object($result)) {
                        if (method_exists($result, 'get')) {
                            try {
                                $secureUrl = $result->get('secure_url') ?? $result->get('url') ?? null;
                                $publicId  = $result->get('public_id') ?? $result->get('publicId') ?? null;
                            } catch (\Throwable $inner) {
                                // ignore
                            }
                        }
                        if (empty($secureUrl) && method_exists($result, 'toArray')) {
                            try {
                                $arr = $result->toArray();
                                $secureUrl = $arr['secure_url'] ?? $arr['url'] ?? $secureUrl;
                                $publicId  = $arr['public_id'] ?? $arr['publicId'] ?? $publicId;
                            } catch (\Throwable $inner) { /* ignore */ }
                        }
                        $secureUrl = $secureUrl ?: ($result->secure_url ?? $result->url ?? null);
                        $publicId  = $publicId  ?: ($result->public_id ?? $result->publicId ?? null);
                    }
                }
            } catch (\Throwable $e) {
                Log::error('Cloudinary upload attempt failed: ' . $e->getMessage(), ['exception' => $e]);
                $secureUrl = null;
                $publicId = null;
            }

            // Si Cloudinary no proporcionó URL, hacemos fallback a storage local (public)
            if (empty($secureUrl)) {
                try {
                    // Guardar en disk public/products
                    $storedPath = Storage::disk('public')->putFile('productos', $file);
                    if ($storedPath) {
                        // url pública
                        $secureUrl = Storage::disk('public')->url($storedPath);
                        $publicId = null; // no aplica
                        Log::info('Fallback local: imagen guardada en storage public', ['path' => $storedPath]);
                    } else {
                        Log::error('Fallback local: no se pudo guardar el archivo en disk public');
                    }
                } catch (\Throwable $e) {
                    Log::error('Fallback local upload failed: ' . $e->getMessage());
                }
            }

            // Limpiar temp si fue creado
            if ($storedTemp && $tempStorePath) {
                try {
                    Storage::disk('local')->delete($tempStorePath);
                } catch (\Throwable $e) {
                    Log::warning('No se pudo borrar temp file: ' . $e->getMessage());
                }
            }

            // Si al final no tenemos URL, devolvemos error amigable
            if (empty($secureUrl)) {
                // No romper todo: devolver con error y mantener old inputs
                return back()
                    ->withInput()
                    ->withErrors(['photo' => 'No se pudo subir la imagen (Cloudinary y fallback local fallaron). Revisa logs.']);
            }

            // Guardar en data
            $data['photo'] = $secureUrl;
            if (!empty($publicId)) $data['photo_public_id'] = $publicId;
        }

        // Crear producto
        $product = Product::create($data);

        return redirect()
            ->route('admin.Tabla-productos')
            ->with('success', 'Producto creado correctamente');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $photoUrl = null;
        if (!empty($product->photo)) {
            $photoUrl = (Str::startsWith($product->photo, ['http://', 'https://']))
                ? $product->photo
                : asset('storage/' . ltrim($product->photo, '/'));
        }

        $route  = route('admin.products.update', $product->id);
        $method = 'PUT';
        $title  = 'Editar producto';

        return view('products.edit', compact('product', 'photoUrl', 'route', 'method', 'title'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name'                      => 'required|string|max:255',
            'title'                     => 'nullable|string|max:255',
            'description'               => 'nullable|string|max:255',
            'contentProductDescription' => 'nullable|string',
            'price'                     => 'required|numeric|min:0',
            'stock'                     => 'required|integer|min:0',

            // Aquí corregimos: aceptamos array de colores
            'colores'       => 'nullable|array',
            'colores.*'     => 'nullable|string|max:50',

            'category'      => 'required|in:camisas,gorras,cafe',
            'status'        => 'required|in:activo,inactivo',

            'photo'         => 'nullable|image|max:4096',
            'remove_photo'  => 'nullable|in:0,1',
        ]);

        // Guardamos los campos básicos
        $saveData = $request->only([
            'name', 'title', 'description', 'contentProductDescription',
            'price', 'stock', 'category', 'status'
        ]);

        // Normalizamos el array de colores igual que en store()
        $rawColors = $request->input('colores', []);
        if (!is_array($rawColors)) $rawColors = [];

        $normalizedColors = array_values(array_unique(array_filter(array_map(function ($c) {
            return is_string($c) ? trim($c) : null;
        }, $rawColors))));

        $saveData['colores'] = $normalizedColors;

        /*
        |--------------------------------------------------------------------------
        | 1) REMOVER IMAGEN SI MARCÓ "remove_photo = 1"
        |--------------------------------------------------------------------------
        */
        if ($request->input('remove_photo') === '1') {

            if (!empty($product->photo_public_id) && class_exists(\Cloudinary\Api\Admin\AdminApi::class)) {
                try {
                    $admin = new \Cloudinary\Api\Admin\AdminApi();
                    $admin->deleteAssets([$product->photo_public_id], ['resource_type' => 'image']);
                } catch (\Throwable $e) {
                    Log::error('Error eliminando imagen Cloudinary (remove): ' . $e->getMessage());
                }
            }

            $saveData['photo'] = null;
            $saveData['photo_public_id'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | 2) SUBIR NUEVA IMAGEN (similar a store)
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            if (!$file->isValid()) {
                return back()->withErrors(['photo' => 'El archivo subido no es válido.']);
            }

            // Borrar imagen anterior si tiene public_id
            if (!empty($product->photo_public_id) && class_exists(\Cloudinary\Api\Admin\AdminApi::class)) {
                try {
                    $admin = new \Cloudinary\Api\Admin\AdminApi();
                    $admin->deleteAssets([$product->photo_public_id], ['resource_type' => 'image']);
                } catch (\Throwable $e) {
                    Log::error('Error borrando asset previo en Cloudinary (update): ' . $e->getMessage());
                }
            }

            $randomPublicId = 'producto_' . Str::uuid()->toString();
            $path = $file->getRealPath() ?: $file->path();

            $secureUrl = null;
            $publicId  = null;

            $uploadOptions = [
                'folder' => 'productos',
                'public_id' => $randomPublicId,
                'overwrite' => true,
                'resource_type' => 'image',
            ];

            try {
                if (class_exists(\Cloudinary\Api\Upload\UploadApi::class)) {
                    $upload = new \Cloudinary\Api\Upload\UploadApi();
                    $result = $upload->upload($path, $uploadOptions);

                } elseif (class_exists(\Cloudinary\Uploader::class)) {
                    $result = \Cloudinary\Uploader::upload($path, $uploadOptions);

                } else {
                    // fallback local
                    $local = Storage::disk('public')->putFile('productos', $file);
                    $saveData['photo'] = Storage::disk('public')->url($local);
                    $saveData['photo_public_id'] = null;
                    $result = null;
                }

                if (!empty($result)) {
                    $secureUrl = $result['secure_url'] ?? null;
                    $publicId  = $result['public_id'] ?? null;
                }

            } catch (\Throwable $e) {
                Log::error("Cloudinary upload error: " . $e->getMessage());
            }

            // fallback si Cloudinary falló
            if (empty($secureUrl)) {
                $stored = Storage::disk('public')->putFile('productos', $file);
                $secureUrl = Storage::disk('public')->url($stored);
                $publicId = null;
            }

            $saveData['photo'] = $secureUrl;
            $saveData['photo_public_id'] = $publicId;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE FINAL
        |--------------------------------------------------------------------------
        */
        $product->update($saveData);

        return redirect()
            ->route('admin.Tabla-productos')
            ->with('success', 'Producto actualizado correctamente');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!empty($product->photo_public_id) && class_exists(\Cloudinary\Api\Admin\AdminApi::class)) {
            try {
                $admin = new AdminApi();
                $admin->deleteAssets([$product->photo_public_id], ['resource_type' => 'image']);
            } catch (\Throwable $e) {
                Log::error('Error eliminando imagen en Cloudinary (destroy): '.$e->getMessage());
            }
        }

        $product->delete();

        return redirect()
            ->route('admin.Tabla-productos')
            ->with('success', 'Producto eliminado correctamente');
    }

    public function featuredProducts()
    {
        $products = Product::where('stock', '>', 0)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return $products;
    }

    public function searchProducts(Request $request)
    {
        $query = Product::query();

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
        }

        $products = $query->paginate(12)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function cantidadProductosCarrito()
    {
        $carrito = session()->get('carrito', []);
        return response()->json([
            'cantidad' => count($carrito)
        ]);
    }
}
