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
           // Membuat nama file gambar sesuai nama produk
            $imageName = $productName . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/products', $imageName);
        }

        // Menyimpan produk ke dalam database
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => basename($imagePath), // Hanya nama file gambar yang disimpan

        ]);

        

        // Redirect ke halaman index atau halaman lain setelah produk disimpan
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all(); // Ambil semua produk
        return view('index', compact('products')); // Menampilkan daftar produk
    }
    // Menampilkan detail produk berdasarkan id
    public function show($id)
    {
        // Cek apakah produk dengan id ditemukan
        $product = Product::find($id);  // Menggunakan find() atau findOrFail()
            // Cari produk berdasarkan ID, beserta kategori terkait
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
<<<<<<< HEAD


            // Cari produk berdasarkan ID, beserta kategori terkait
        $product = Product::with('category')->findOrFail($id);
=======
>>>>>>> 1339f0b0c6db79ffe3d00054dadf609c79ed2b09

        if (!$product) {
            return abort(404);  // Jika produk tidak ditemukan, tampilkan halaman 404
        }

        return view('product', compact('product', 'categories'));
    }
    public function showProduct($id)
    {
        // Ambil kategori dari database (misalnya semua kategori)
        $categories = Category::all();
    
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);
    
        return view('product', compact('product', 'categories'));
    }
    
}