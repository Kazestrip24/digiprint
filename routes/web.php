<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;





Route::resource('categories', CategoryController::class);
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('product.show');
//Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show'); // Detail produk
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/kontak', [ContactController::class, 'showContactForm'])->name('kontak');
//Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/products', [ProductController::class, 'showProductForm'])->name('product');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');








