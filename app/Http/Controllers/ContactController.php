<?php

namespace App\Http\Controllers;
use App\Models\Category;


use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontak'); // Nama view yang akan ditampilkan
    }
    
    public function showContactForm()
{
    // Ambil semua kategori dari database
    $categories = Category::all();

    // Kirimkan ke view kontak
    return view('kontak', compact('categories'));
}
}
