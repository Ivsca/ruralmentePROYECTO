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
use App\Http\Controllers\Admin\TriajeExportController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

// routes/web.php (temporal)
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



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/paquetes', function () {
    return view('paquetes');
})->name('paquetes');



//antes de registrarse
Route::view('/Quienes_somos', 'about')->name('about');
Route::view('/ruralmente-servicios', 'ruralmente_servicios')->name('ruralServicios');
Route::view('/cotizacion', 'servicios.cotizacion')->name('cotizacion');
Route::view('/mis_product', 'products.mis-product')->name('mis-product');




// Ruta pública para ver el formulario
Route::get('/servicios/triaje', [TriajeController::class, 'create'])->name('triaje.create');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::post('/servicios/triaje', [TriajeController::class, 'store'])->name('triaje.store');
    Route::get('/servicios/triaje/{triaje}', [TriajeController::class, 'show'])->name('triaje.show');
});

Route::get('/admin/triaje', TriajeAdmin::class)
    ->middleware('can:admin.index')
    ->name('admin.triaje');

Route::get('/admin/triaje/export', [TriajeExportController::class, 'export'])
    ->middleware('can:admin.index')
    ->name('admin.triaje.export');





Route::view('/productos/perchas', 'products.perchas')->name('productos.perchas');
Route::view('/paquetes', 'paquetes')->name('paquetes');

//Formulario cotización
Route::post('/cotizacion/enviar', [App\Http\Controllers\CotizacionController::class, 'enviar'])
    ->name('cotizacion.enviar');




//ruta temporal del administrador
Route::get('/admin', AdminIndex::class)->middleware('can:admin.index')->name('admin.index');
Route::get('/admin/Grupo_trabajo', Groups::class)->middleware('can:admin.index')->name('admin.group');
Route::get('/admin/Products', ProductAdmin::class)->middleware('can:admin.index')->name('admin.product');
// Route::get('/admin/Encuesta', Questionnaire::class)->name('encuesta');
Route::get('/admin/Planes', Planes::class)->middleware('can:admin.planes')->name('admin.planes');
Route::get('/admin/Agricultores', Agricultor::class)->middleware('can:admin.agricultores')->name('admin.agricultores');
Route::get('/Admin/Categorias', CategoryAgro::class)->middleware('can:admin.categories')->name('admin.categories');
// Route::get('admin/Planes/Agregar_planes', CreatePlan::class)->name('admin.plan.CreatePlan');
Route::get('/admin/planes', CreateAgricultor::class)->middleware('can:admin.agricultor.createAgricultor')->name('admin.agricultor.createAgricultor');



Route::get('/Agendas', AgendaAdmin::class)->name('agendaAdmin');



// crud de productos 

//Productos en el home
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/Tabla-productos', [ProductController::class, 'tablaProductos'])
    ->middleware(['auth', 'role:admin'])
    ->name('Tabla-productos');

// CRUD existentes (mantén los tuyos)
Route::get('/productos/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/productos', [ProductController::class, 'store'])->name('products.store');
Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/productos/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/searchProducts', [ProductController::class, 'searchProducts'])->name('searchProducts');

Route::get('/cantidad-productos-carrito', [ProductController::class, 'cantidadProductosCarrito'])->name('cantidad-productos-carrito');
Route::post('/agregar_al_carrito/{id}', [CartController::class, 'add'])
    ->name('addCarrito');



// Show products (use controller so $products is provided)
Route::get('/productos-vista', [ProductController::class, 'index'])->name('mis-product');

// Listado de productos (keep or remove duplicate '/productos' if you want only one URL)
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');

// Detalle de producto
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('products.show');

// Carrito
Route::post('/agregar_al_carrito', [CartController::class, 'add'])->name('addCarrito');

//rutas del carrito de compras
Route::post('/agregar_al_carrito', [CartController::class, 'add'])->name('addCarrito');
Route::get('/carrito', [CartController::class, 'checkout'])->name('checkout');
Route::get('/carrito/clear', [CartController::class, 'clear'])->name('clear');
Route::post('/carrito/remove', [CartController::class, 'remove'])->name('removeItem');

Route::post('/carrito/decremento_cantidad', [CartController::class, 'decrement'])->name('decrement');
Route::post('/carrito/incremento_cantidad', [CartController::class, 'increment'])->name('increment');
//sistema de pago 
Route::get('/Sistema_de_pago/{id}', [SystemPago::class, 'render', 'mount'])->name('pago');


//Ruta de controlador de los eventos zona de pago
Route::post('/Pago_Evento/{id}', [EventCalendarController::class, 'view'])->middleware('auth')->name('ViewEventPay');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return 'Bienvenido Admin';
    });
});

Route::middleware(['auth', 'role:usuario'])->group(function () {
    Route::get('/perfil', function () {
        return 'Bienvenido Usuario';
    });
});

