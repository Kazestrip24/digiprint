<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Halaman utama (Home)
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Produk
Route::get('/products', [ProductController::class, 'index'])->name('product.index'); // Daftar produk
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); // Detail produk

// Kategori
Route::resource('categories', CategoryController::class);
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

// Kontak
Route::get('/kontak', [ContactController::class, 'showContactForm'])->name('kontak');

// Cart (Keranjang)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');



// Autentikasi
Auth::routes(); // Menangani login, registrasi, dan reset password

// Tambahan rute setelah login (jika diperlukan)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard'); // Contoh halaman setelah login
});

Route::middleware(['auth', 'role:admin'])->group(function () { 
});

// Checkout dan Order
Route::middleware('auth')->group(function () {
    // Rute checkout (GET)
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Rute storeCheckout (POST)
    Route::post('/checkout', [OrderController::class, 'storeCheckout'])->name('checkout.store');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // Order sukses
    Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');
});