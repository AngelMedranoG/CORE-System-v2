<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//whatsapp
Route::prefix('whatsapp')->name('whatsapp.')->group(function() {
    Route::get('/', [App\Http\Controllers\AD\WhatsAppController::class, 'verifyToken'])->name('verifyToken');
    Route::post('/', [App\Http\Controllers\AD\WhatsAppController::class, 'receivedMessage'])->name('receivedMessage');
}); 