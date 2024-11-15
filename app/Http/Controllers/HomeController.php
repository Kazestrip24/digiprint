<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        
      
        $products = Product::all();   // Mengambil semua produk
        $categories = Category::all(); // Mengambil semua kategori

        // Kirim data ke view home.blade.php
        return view('home', compact('products', 'categories'));
    }
}
