<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan halaman checkout
    public function checkout()
    {
        $cartItems = session()->get('cart', []);

        // Menghitung total harga keranjang
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cartItems', 'totalPrice'));
    }

    // Menyimpan order baru ke dalam database (POST method)
    public function storeCheckout(Request $request)
    {
        // Pastikan pengguna login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda perlu login terlebih dahulu.');
        }

        // Mengambil data keranjang dari sesi
        $cart = session()->get('cart', []);

        // Jika tidak ada item di keranjang
        if (empty($cart)) {
            return redirect()->route('checkout')->with('error', 'Keranjang Anda kosong.');
        }

         // Menghitung total harga
    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
    // Membuat order baru dan menambahkan user_id
    $order = Order::create([
        'order_number' => 'ORD-' . strtoupper(uniqid()), // Nomor order unik
        'user_id' => Auth::id(),  // Menambahkan user_id untuk mengaitkan dengan pengguna yang login
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

    
    // Menyimpan total harga ke session
    session()->put('totalPrice', $totalPrice);

    // Redirect ke halaman sukses dan kirimkan total harga ke view
    return redirect()->route('order.success', ['totalPrice' => $totalPrice]);
        // Mengosongkan keranjang setelah order berhasil dibuat
        session()->forget('cart');
    }

    public function success()
    {
        $totalPrice = session('totalPrice');
        return view('success', compact('totalPrice'));
    }

}
