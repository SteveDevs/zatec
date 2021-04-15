<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/user', function () {
        return view('layouts.spa');
    });


Route::group(['prefix'=>'admin','as'=>'admin.'], function(){

    Route::get('/', function () {
        return route('admin.login');
    });
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');

    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

    Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::post('/products/delete', [ProductController::class, 'destroy'])->name('products.destroy');
});