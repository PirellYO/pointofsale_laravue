<?php

use App\Http\Controllers\LineArticleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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

Route::get('/produits', [ProductController::class, 'index']);

// Route::put('/produits', [ProductController::class, 'update']);
Route::put('/produits/{id}', [ProductController::class, 'update']);


Route::post('/ventes', [SaleController::class, 'store']);

Route::get('/ventes', [SaleController::class, 'index']);

Route::get('/paiements', [PaymentController::class, 'index']);

Route::post('/paiements', [PaymentController::class, 'store']);

Route::get('/lignearticles', [LineArticleController::class, 'index']);

Route::post('/lignearticles', [LineArticleController::class, 'store']);

