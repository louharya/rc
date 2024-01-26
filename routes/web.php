<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Normal Users Routes List
Route::get('/home', [HomeController::class, 'index'])->name('user.home');

Route::get('/admin/index', [HomeController::class, 'adminHome'])->name('admin.home');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/create/{productId}', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/create-invoice/{id}', [OrdersController::class, 'moveDataFromOrderToInvoice'])->name('create-invoice');
Route::get('/admin/laporan', [OrdersController::class, 'laporan']);
