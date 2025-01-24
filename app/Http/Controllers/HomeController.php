<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman home (default)
     */
    public function index()
    {
        // Ambil data pengaturan (misalnya banner image dan teks)
        $setting = Setting::first();
        $products = Product::all();   // Mengambil semua produk
        $categories = Category::all(); // Mengambil semua kategori

        // Kirim data ke view home.blade.php
        return view('home', compact('setting', 'products', 'categories'));
    }

    /**
     * Menampilkan halaman login
     */
    public function login()
    {
        return view('login'); // Mengarah ke login.blade.php
    }

    /**
     * Proses autentikasi login
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/'); // Redirect ke halaman home
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman home
    }
}
