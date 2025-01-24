<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        // Dapatkan item keranjang dari session
        $cartItems = session()->get('cart', []);

        // Jika keranjang kosong, tampilkan pesan atau redirect
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Menghitung total harga keranjang
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Kirim data keranjang dan total harga ke view
        return view('checkout', compact('cartItems', 'totalPrice'));
    }

    // Proses checkout (misalnya, buat pesanan, pembayaran, dll.)
    public function process(Request $request)
    {
        // Ambil data keranjang dari sesi
        $cart = session()->get('cart', []);

        // Cek apakah keranjang kosong
        if (empty($cart)) {
            return redirect()->route('checkout')->with('error', 'Keranjang Anda kosong.');
        }

        // Simulasi pemrosesan checkout
        // Misalnya, simpan pesanan ke database, kirim email, dll.
        // Jika ada logika lain yang diperlukan, lakukan di sini

        // Contoh mengosongkan keranjang setelah checkout
        session()->forget('cart');

        // Redirect ke halaman checkout dengan pesan sukses
        return redirect()->route('checkout')->with('success', 'Pembelian berhasil!');
    }
}
