<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Menampilkan form untuk menambah produk
    public function create()
    {
        return view('products.create'); // Pastikan ada view untuk form tambah produk
    }

    // Menyimpan produk ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Misalnya ada kategori produk
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Mengambil nama produk dan memastikan formatnya bersih (tanpa spasi atau karakter aneh)
        $productName = Str::slug($request->name); // Mengubah nama produk menjadi format slug (misalnya "produk-kertas-a4")

        // Menyimpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $productName . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images', $imageName); // Menyimpan dengan nama yang ditentukan
        }

        // Menyimpan produk ke dalam database
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => basename($imagePath), // Simpan hanya nama file gambar
        ]);

        // Redirect ke halaman index atau halaman lain setelah produk disimpan
        return redirect()->route('products.index');
    }

    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all(); // Ambil semua produk
        return view('products.index', compact('products')); // Menampilkan daftar produk
    }
}