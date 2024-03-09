<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaketController;
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

Route::get('/pakets', [PaketController::class, 'index']);


Route::get('/pakets/create', [PaketController::class, 'create']);


Route::post('/pakets', [PaketController::class, 'store']);

Route::get('/pakets/{id}', [PaketController::class, 'show']);


Route::get('/pakets/{id}/edit', [PaketController::class, 'edit']);


Route::put('/pakets/{id}', [PaketController::class, 'update']);

Route::delete('/pakets/{id}', [PaketController::class, 'destroy']);
