<?php

use App\Http\Controllers\StockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('stock')->group(function () {
    Route::get('/', [StockController::class, 'index']);
    Route::get('/{id}', [StockController::class, 'show']);
    Route::post('/', [StockController::class, 'store']);
    Route::put('/{id}', [StockController::class, 'update']);
    Route::delete('/{id}', [StockController::class, 'destroy']);
});

