<?php

use App\Http\Controllers\EventCalendarController;
use App\Http\Controllers\TriajeController;
use App\Livewire\Admin\AdminIndex;
use App\Livewire\Admin\AgendaAdmin;
use App\Livewire\Admin\Agricultor;
use App\Livewire\Admin\CategoryAgro;
use App\Livewire\Admin\Groups;
use App\Livewire\Admin\Planes;
use App\Livewire\Admin\ProductAdmin;
use App\Livewire\Admin\Questionnaire;
use App\Livewire\Admin\UsersAdminIndex;
use App\Livewire\Modal\Admin\CreateAgricultor;
use App\Livewire\Modal\Admin\CreatePlan;
use App\Livewire\SystemPago;
use App\Livewire\Admin\TriajeAdmin;
use App\Http\Controllers\TriajeExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\Admin\TriajeController as AdminTriajeController;
use App\Http\Controllers\CotizacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Debug routes
Route::get('/_debug/cloudinary', function () {
    dd(config('cloudinary'));
});

Route::get('/debug-cloudinary-test', function () {
    try {
        $upload = Cloudinary::upload('https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png', [
            'folder' => 'productos/tests',
            'public_id' => 'test_public_url_' . time(),
            'overwrite' => false,
        ]);
        return response()->json([
            'secure' => $upload->getSecurePath(),
            'public_id' => $upload->getPublicId(),
            'raw' => $upload,
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ], 500);
    }
});

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/paquetes', function () {
    return view('paquetes');
})->name('paquetes');

// Páginas públicas
Route::view('/Quienes_somos', 'about')->name('about');
Route::view('/ruralmente-servicios', 'ruralmente_servicios')->name('ruralServicios');
Route::view('/cotizacion', 'servicios.cotizacion')->name('cotizacion');
Route::view('/mis_product', 'products.mis-product')->name('mis-product');
Route::view('/productos/perchas', 'products.perchas')->name('productos.perchas');

// Formulario cotización
Route::post('/cotizacion/enviar', [CotizacionController::class, 'enviar'])
    ->name('cotizacion.enviar');

// Triajes públicos
// Mostrar el formulario o el mensaje de acceso restringido
    Route::get('/servicios/triaje/create', function () {
        return view('servicios.triaje');
    })->name('triaje.create');

// Productos públicos
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/productos-vista', [ProductController::class, 'index'])->name('mis-product');
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/searchProducts', [ProductController::class, 'searchProducts'])->name('searchProducts');

// Carrito de compras
Route::post('/agregar_al_carrito', [CartController::class, 'add'])->name('addCarrito');
Route::post('/agregar_al_carrito/{id}', [CartController::class, 'add'])->name('addCarrito.id');
Route::get('/carrito', [CartController::class, 'checkout'])->name('checkout');
Route::get('/carrito/clear', [CartController::class, 'clear'])->name('clear');
Route::post('/carrito/remove', [CartController::class, 'remove'])->name('removeItem');
Route::post('/carrito/decremento_cantidad', [CartController::class, 'decrement'])->name('decrement');
Route::post('/carrito/incremento_cantidad', [CartController::class, 'increment'])->name('increment');
Route::get('/cantidad-productos-carrito', [ProductController::class, 'cantidadProductosCarrito'])->name('cantidad-productos-carrito');

// Sistema de pago
Route::get('/Sistema_de_pago/{id}', [SystemPago::class, 'render'])->name('pago');

// Eventos de pago
Route::post('/Pago_Evento/{id}', [EventCalendarController::class, 'view'])->middleware('auth')->name('ViewEventPay');

// ============================================================================
// RUTAS PROTEGIDAS (requieren autenticación)
// ============================================================================
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    // Dashboard principal de usuarios
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // ============================================================================
    // RUTAS DE TRIAJES PARA USUARIOS NORMALES
    // ============================================================================

        
    // Mis triajes - Vista para usuarios normales (sus propios triajes)
    Route::get('/mis-triajes', [TriajeController::class, 'index'])->name('mis.triajes');
    
    // Crear nuevo triaje (disponible para todos los usuarios autenticados)
    Route::post('/servicios/triaje', [TriajeController::class, 'store'])->name('triaje.store');
    
    // Ver mi triaje específico (solo el usuario que lo creó)
    Route::get('/servicios/triaje/{triaje}', [TriajeController::class, 'show'])->name('triaje.show');

    // ============================================================================
    // RUTAS DE ADMINISTRACIÓN (requieren rol admin)
    // ============================================================================
    Route::middleware(['can:admin.index'])->prefix('admin')->name('admin.')->group(function () {
        
        // Panel de control principal (nuevo diseño con sidebar)
        Route::get('/panel', [DashboardController::class, 'index'])->name('panel');
        
        // Dashboard Livewire existente
        Route::get('/', AdminIndex::class)->name('index');
        
        // Gestión de usuarios
        Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
        Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/exportar/usuarios', [UserController::class, 'export'])->name('export.users');
        
        // Gestión de productos
        Route::get('/productos', [ProductAdminController::class, 'index'])->name('products.index');
        Route::get('/productos/{id}/edit', [ProductAdminController::class, 'edit'])->name('products.edit');
        Route::put('/productos/{id}', [ProductAdminController::class, 'update'])->name('products.update');
        Route::delete('/productos/{id}', [ProductAdminController::class, 'destroy'])->name('products.destroy');
        Route::get('/productos/vendidos', [ProductAdminController::class, 'sold'])->name('products.sold');
        Route::get('/exportar/productos', [ProductAdminController::class, 'export'])->name('export.products');
        
        // ============================================================================
        // GESTIÓN DE TRIAJES PARA ADMINISTRADORES (todos los triajes)
        // ============================================================================
        
        // Lista de todos los triajes (vista admin)
        Route::get('/triajes', [AdminTriajeController::class, 'index'])->name('triajes.index');
        
        // Ver cualquier triaje (admin puede ver todos)
        Route::get('/triajes/{id}', [AdminTriajeController::class, 'show'])->name('triajes.show');
        
        // Eliminar triaje (solo admin)
        Route::delete('/triajes/{id}', [AdminTriajeController::class, 'destroy'])->name('triajes.destroy');
        
        // Exportar triajes (solo admin)
        Route::get('/exportar/triajes', [AdminTriajeController::class, 'export'])->name('export.triajes');
        
        // Livewire Admin Components (rutas existentes)
        Route::get('/triaje', TriajeAdmin::class)->name('triaje');
        Route::get('/triaje/export', [TriajeExportController::class, 'export'])->name('triaje.export');
        
        Route::get('/Grupo_trabajo', Groups::class)->name('group');
        Route::get('/Products', ProductAdmin::class)->name('product');
        Route::get('/Planes', Planes::class)->middleware('can:admin.planes')->name('planes');
        Route::get('/Agricultores', Agricultor::class)->middleware('can:admin.agricultores')->name('agricultores');
        Route::get('/Categorias', CategoryAgro::class)->middleware('can:admin.categories')->name('categories');
        Route::get('/planes/create', CreateAgricultor::class)->middleware('can:admin.agricultor.createAgricultor')->name('agricultor.createAgricultor');
        
        // Estadísticas
        Route::get('/estadisticas', [DashboardController::class, 'stats'])->name('stats');
        
        // Productos CRUD (compatibilidad con rutas existentes)
        Route::get('/Tabla-productos', [ProductController::class, 'tablaProductos'])->name('Tabla-productos');
        Route::get('/productos/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
        Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/productos/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
    
    // Agendas (protegida pero no necesariamente admin)
    Route::get('/Agendas', AgendaAdmin::class)->name('agendaAdmin');
    
    // Rutas por roles específicos
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard-old', function () {
            return 'Bienvenido Admin (ruta antigua)';
        });
    });
    
    Route::middleware(['role:usuario'])->group(function () {
        Route::get('/perfil', function () {
            return 'Bienvenido Usuario';
        });
    });
});

// ============================================================================
// RUTAS DE FALLBACK
// ============================================================================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});