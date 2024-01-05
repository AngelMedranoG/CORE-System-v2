<?php

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

Route::prefix('sistema')->middleware(['auth'])->group(function () {

     //Asistencia Digital 
     Route::prefix('atencion-digital')->group(function () {
        //Route::resource('clientes', App\Http\Controllers\ClientesController::class)->names('clientes');
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