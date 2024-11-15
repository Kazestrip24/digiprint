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
        
                // Ambil data pengaturan (misalnya banner image dan teks)
        $setting = Setting::first(); // Ambil pengaturan pertama atau sesuaikan dengan kebutuhan
                $bannerImage = $setting->banner_image;
                $bannerText = $setting->banner_text;  // Ambil teks banner
        $products = Product::all();   // Mengambil semua produk
        $categories = Category::all(); // Mengambil semua kategori

        // Kirim data ke view home.blade.php
        return view('home', compact('setting', 'products', 'categories'));
    }


}
