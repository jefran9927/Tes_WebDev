<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangApiController;
use App\Http\Controllers\TransactionApiController;

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




Route::get('/barangs', [BarangApiController::class, 'index']);
Route::get('/barangs/{barang}', [BarangApiController::class, 'show']);
Route::get('/transactions', [TransactionApiController::class, 'index']);
Route::get('/transactions/{transaction}', [TransactionApiController::class, 'show']);
Route::get('/transactions/compare', [TransactionApiController::class, 'compare']);

