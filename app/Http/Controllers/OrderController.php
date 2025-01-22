<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan halaman checkout
    public function checkout()
    {
        $cartItems = session()->get('cart', []);
        return view('checkout', compact('cartItems'));
    }

    // Menyimpan order baru ke dalam database
    public function store(Request $request)
    {
        // Pastikan pengguna login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda perlu login terlebih dahulu.');
        }

        // Mengambil data keranjang dari sesi
        $cart = session()->get('cart', []);

        // Jika tidak ada item di keranjang
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Membuat order baru
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()), // Nomor order unik
            'user_id' => Auth::id(),
        ]);

        // Menyimpan item dari keranjang ke tabel order_items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Menghapus data keranjang setelah order berhasil dibuat
        session()->forget('cart');

        return redirect()->route('order.success')->with('success', 'Pesanan berhasil dibuat.');
    }

    // Halaman sukses setelah pesanan berhasil dibuat
    public function success()
    {
        return view('order.success');
    }
}
