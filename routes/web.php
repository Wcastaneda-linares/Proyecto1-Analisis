<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimpiezaController;
use App\Http\Controllers\DistribucionController;
use App\Http\Controllers\EntradaPromocionController;
use App\Http\Controllers\RecursosHumanosController;
use App\Http\Controllers\LimpiezaExportController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('welcome') ;
})->name ('inicio');

Route::get('home', function () {
    return view('home') ;
})->name ('home');


//Rutas para las limpiezas
Route::get('limpieza', [LimpiezaController::class, 'index'])->name('limpieza');
Route::get('create/limpieza', [LimpiezaController::class, 'create'])->name('create/limpieza');
Route::post('limpieza', [LimpiezaController::class, 'store'])->name('limpieza.store');
Route::get('limpieza/{id}/edit', [LimpiezaController::class, 'edit'])->name('limpieza.edit');
Route::put('limpieza/{id}', [LimpiezaController::class, 'update'])->name('limpieza.update');
Route::get('/limpiezas', [LimpiezaController::class, 'index'])->name('limpiezas.index');
Route::post('create', [LimpiezaController::class, 'store']);
Route::delete('limpieza/{id}', [LimpiezaController::class, 'destroy'])->name('limpieza.destroy');

//Rutas para la gestion de destribucion
Route::get('distribucion', [DistribucionController::class, 'index'])->name('distribucion');
Route::get('create/distribucion', [DistribucionController::class, 'create'])->name('create/distribucion');
Route::post('distribuciones', [DistribucionController::class, 'store'])->name('distribuciones.store');
Route::get('distribucion/{id}/edit', [DistribucionController::class, 'edit'])->name('distribucion.edit');
Route::put('distribucion/{id}', [DistribucionController::class, 'update'])->name('distribucion.update');
Route::get('/distribuciones', [DistribucionController::class, 'index'])->name('distribuciones.index');
Route::post('create', [DistribucionController::class, 'store']);
Route::delete('distribuciones/{id}', [DistribucionController::class, 'destroy'])->name('distribucion.destroy');

//Rutas para las entradas de promociones
Route::get('entrada-promocion', [EntradaPromocionController::class, 'index'])->name('entrada-promocion');
Route::get('entradas-promociones/create', [EntradaPromocionController::class, 'create'])->name('entradas-promociones.create');
Route::post('entradas-promociones', [EntradaPromocionController::class, 'store'])->name('entradas-promociones.store');
Route::get('entradas/promociones/{id}/edit', [EntradaPromocionController::class, 'edit'])->name('entradas-promociones.edit');
Route::put('entradas/promociones/{id}', [EntradaPromocionController::class, 'update'])->name('entradas-promociones.update');
Route::get('/entradas-promociones', [EntradaPromocionController::class, 'index'])->name('entradas-promociones.index');
Route::post('create', [EntradaPromocionController::class, 'store']);
Route::delete('entradas/promociones/{id}', [EntradaPromocionController::class, 'destroy'])->name('entradas-promociones.destroy');

//Rutas para recursos humanos
Route::get('recursohumano', [RecursosHumanosController::class, 'index'])->name('recursohumano');
Route::get('recursoshumanos/create', [RecursosHumanosController::class, 'create'])->name('recursos-humanos.create');
Route::post('recursoshumanos', [RecursosHumanosController::class, 'store'])->name('recursos-humanos.store');
Route::get('recursoshumanos/{id}/edit', [RecursosHumanosController::class, 'edit'])->name('recursos-humanos.edit');
Route::put('recursoshumanos/{id}', [RecursosHumanosController::class, 'update'])->name('recursos-humanos.update');
Route::get('/recursoshumanos', [RecursosHumanosController::class, 'index'])->name('recursos-humanos.index');
Route::post('create', [RecursosHumanosController::class, 'store']);
Route::delete('recursoshumanos/{id}', [RecursosHumanosController::class, 'destroy'])->name('recursos-humanos.destroy');


//Rutas para exportar a excel
Route::get('exportar/distribucion', [DistribucionController::class, 'exportExcel'])->name('exportar/distribucion');
Route::get('exportar/entradas/promociones', [EntradaPromocionController::class, 'exportExcel'])->name('exportar/entradas/promociones');
Route::get('exportar/recursos/humanos', [RecursosHumanosController::class, 'exportExcel'])->name('exportar/recursos/humanos');
Route::get('exportar/limpieza', [LimpiezaController::class,'exportExcel'])->name('exportar/limpieza');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
