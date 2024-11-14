<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('index');
});
Route::get('/produk', function () {
    return view('produk');
});
Route::get('/kontak', function () {
    return view('kontak');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/categories', function () {
    return view('product');
});
Route::resource('categories', CategoryController::class);



