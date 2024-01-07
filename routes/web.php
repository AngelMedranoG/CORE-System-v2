<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::middleware(['auth'])->prefix('sistema')->name('sistema.')->group(function () {

    //Asistencia Digital 
    Route::prefix('atencion-digital')->name('atencion-digital.')->group(function () {

        // Dashboard
        Route::get('/', [App\Http\Controllers\AD\DashboardController::class, 'index'])->name('index');

        // Categorías
        Route::resource('categorias', App\Http\Controllers\AD\CategoriasController::class, ['except' => ['show', 'store', 'update', 'destroy']])->names('categorias');

        // Subcategorías
        Route::prefix('categorias/{categoriaId}/subcategorias')->name('subcategorias.')->group(function() {

            Route::get('/', [App\Http\Controllers\AD\SubcategoriasController::class, 'index'])->name('index');

            Route::get('/create', [App\Http\Controllers\AD\SubcategoriasController::class, 'create'])->name('create');

            Route::get('/{subcategoriaId}/edit', [App\Http\Controllers\AD\SubcategoriasController::class, 'edit'])->name('edit');
        });

        // Estatus
        Route::resource('estatus', App\Http\Controllers\AD\EstatusController::class, ['except' => ['show', 'store', 'update', 'destroy']])->names('estatus');

        // Colonias
        Route::resource('colonias', App\Http\Controllers\AD\ColoniasController::class, ['except' => ['show', 'store', 'update', 'destroy']])->names('colonias');
      
        // Canales
        Route::resource('canales', App\Http\Controllers\AD\CanalesController::class, ['except' => ['show', 'store', 'update', 'destroy']])->names('canales');
      
        // Departamentos
        Route::resource('departamentos', App\Http\Controllers\AD\DepartamentosController::class, ['except' => ['show', 'store', 'update', 'destroy']])->names('departamentos');

    });

    //Expediente Digital 
    Route::prefix('gestion-ciudadana')->group(function () {
        //Route::resource('clientes', App\Http\Controllers\ClientesController::class)->names('clientes');
    });

    //Expediente Digital 
    Route::prefix('expediente-digital')->group(function () {
        //Route::resource('clientes', App\Http\Controllers\ClientesController::class)->names('clientes');
    });

    //Expediente Digital 
    Route::prefix('encuestas')->group(function () {
        //Route::resource('clientes', App\Http\Controllers\ClientesController::class)->names('clientes');
    });

});
