<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\TopupAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\PurchaseAPIController;

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
Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);
     
//Route::middleware('auth:api')->group( function () {
    Route::resource('products', ProductAPIController::class);
    Route::post('transactions', [TransactionController::class, 'get']);
    Route::post('/topup', [TopupAPIController::class, 'get']);
    Route::post('/topup/update', [TopupAPIController::class, 'update'])->name('topup.update');
    Route::post('/purchases/create', [PurchaseAPIController::class, 'store'])->name('purchases.create');
//});