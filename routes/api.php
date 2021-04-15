<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\TopupController;
use App\Http\Controllers\API\ProductController;
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
    Route::resource('products', ProductController::class);
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/topup/{user_id}', [TopupController::class, 'get'])->name('topup');
    Route::post('/topup/update/{user_id}', [TopupController::class, 'update'])->name('topup.update');
    Route::post('/purchases/create', [PurchaseAPIController::class, 'store'])->name('purchases.create');
//});