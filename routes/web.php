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

//whatsapp
Route::prefix('whatsapp/api')->name('whatsapp.')->group(function() {
    Route::get('/', [App\Http\Controllers\AD\WhatsAppController::class, 'verifyToken'])->name('verifyToken');
    Route::post('/', [App\Http\Controllers\AD\WhatsAppController::class, 'receivedMessage'])->name('receivedMessage');
}); 

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::middleware(['auth'])->prefix('sistema')->name('sistema.')->group(function () {

    //Asistencia Digital 
    Route::prefix('atencion-digital')->name('atencion-digital.')->group(function () {

        Route::get('/', [App\Http\Controllers\AD\DashboardController::class, 'index'])->name('index');

        Route::resource('categorias', App\Http\Controllers\AD\CategoriasController::class, ['except' => ['store', 'update', 'destroy']])->names('categorias');

        Route::prefix('categorias/{categoriaId}/subcategorias')->name('subcategorias.')->group(function() {

            Route::get('/', [App\Http\Controllers\AD\SubcategoriasController::class, 'index'])->name('index');

            Route::get('/create', [App\Http\Controllers\AD\SubcategoriasController::class, 'create'])->name('create');

            Route::get('/{subcategoriaId}/edit', [App\Http\Controllers\AD\SubcategoriasController::class, 'create'])->name('create');
        });


      
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
