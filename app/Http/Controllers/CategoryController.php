<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::all();  // Mengambil semua kategori
        return view('category', compact('categories'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('categories.create');
    }
    public function show($id)
{
    // Ambil kategori dan produk yang terkait
    $category = Category::findOrFail($id);
    $products = $category->products; // Asumsi produk memiliki relasi ke kategori

    return view('category', compact('category', 'products'));
}

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        Category::create($request->all()); // Menyimpan kategori

        return redirect()->route('categories.index');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Memperbarui kategori yang ada
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        $category->update($request->all()); // Memperbarui kategori

        return redirect()->route('categories.index');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        $category->delete();  // Menghapus kategori

        return redirect()->route('categories.index');
    }
    
    public function showCategory($id)
{
    $category = Category::find($id); // Ganti sesuai model Anda
    $products = $category->products; // Pastikan relasi `products` didefinisikan di model Category

    return view('category', compact('category', 'products'));
}

}

