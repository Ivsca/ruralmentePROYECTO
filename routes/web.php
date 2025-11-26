<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EventCalendarController;
use App\Livewire\Admin\AdminIndex;
use App\Livewire\Admin\AgendaAdmin;
use App\Livewire\Admin\Agricultor;
use App\Livewire\Admin\CategoryAgro;
use App\Livewire\Admin\Diagnostico;
use App\Livewire\Admin\Groups;
use App\Livewire\Admin\Planes;
use App\Livewire\Admin\ProductAdmin;
use App\Livewire\Admin\Questionnaire;
use App\Livewire\Admin\Taller;
use App\Livewire\Admin\UsersAdminIndex;
use App\Livewire\AppointmentSchedule;
use App\Livewire\Modal\Admin\CreateAgricultor;
use App\Livewire\Modal\Admin\CreatePlan;
use App\Livewire\SystemPago;
use App\Livewire\TourismPage;
use Illuminate\Support\Facades\Route;

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

Route::get('/news-view', function () {
    return view('news-view');
})->name('news.view');


//antes de registrarse
Route::view('/Quienes_somos', 'about')->name('about');
Route::view('/Ruralmente_cafe', 'ruralmente-cafe')->name('ruralCafe');
Route::view('/encuestaAgro', 'agro')->name('encuestaAgro');
Route::view('/mis_product', 'products.mis-product')->name('mis-product');
Route::view('/Ruralmente_Turismo', 'courses-workshop')->name('tourism');


Route::view('/turismo/Agroturismo', 'tourism.agrotourism' )->name('agro');
Route::view('/turismo/Talleres_cursos', 'tourism.workshop-courses-view' )->name('workshop-course');
Route::view('/noticias', 'news-view')->name('news');




//ruta temporal del administrador
Route::get('/admin', AdminIndex::class)->middleware('can:admin.index')->name('admin.index');
Route::get('/admin/Grupo_trabajo', Groups::class)->middleware('can:admin.index')->name('admin.group');
Route::get('/admin/Products', ProductAdmin::class)->middleware('can:admin.index')->name('admin.product');
Route::get('/admin/Turismo', Taller::class)->middleware('can:admin.taller')->name('admin.taller');
// Route::get('/admin/Encuesta', Questionnaire::class)->name('encuesta');
Route::get('/admin/Planes', Planes::class)->middleware('can:admin.planes')->name('admin.planes');
Route::get('/admin/Agricultores', Agricultor::class)->middleware('can:admin.agricultores')->name('admin.agricultores');
Route::get('/Admin/Categorias', CategoryAgro::class)->middleware('can:admin.categories')->name('admin.categories');
// Route::get('admin/Planes/Agregar_planes', CreatePlan::class)->name('admin.plan.CreatePlan');
Route::get('/admin/planes', CreateAgricultor::class)->middleware('can:admin.agricultor.createAgricultor')->name('admin.agricultor.createAgricultor');



Route::get('/Agendas', AgendaAdmin::class)->name('agendaAdmin');

Route::get('/Turismo', TourismPage::class)->name('Turism');
Route::get('/Agenda_de_eventos/{id}', [AppointmentSchedule::class, 'render'])->name('EventCalendar');

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



