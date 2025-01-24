<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);

                // Menghitung total harga keranjang
                $totalPrice = 0;
                foreach ($cartItems as $item) {
                    $totalPrice += $item['price'] * $item['quantity'];
                }

        return view('cart', compact('cartItems', 'totalPrice'));
    }

    

    public function add(Request $request)
    {
        // Ambil data keranjang yang ada
        $cart = session()->get('cart', []);
        
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($request->input('product_id'));
        
        // Jika produk sudah ada di keranjang, tambah kuantitasnya
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->input('quantity', 1);
        } else {
            // Jika produk belum ada di keranjang, tambahkan produk baru
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->input('quantity', 1),
            ];
        }
        


        
        // Simpan kembali ke sesi
        session()->put('cart', $cart);

        // Jika pengguna login, simpan keranjang ke database
        if(auth()->check()) {
            // Cek apakah sudah ada pesanan aktif
            $order = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()), // Contoh nomor order
                'user_id' => auth()->id(),
            ]);

            // Simpan item keranjang ke dalam order_items
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }

        // Kirim respons JSON
        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang.']);
    
    }

      // Proses checkout dan buat pesanan
      public function checkout()
      {
          // Ambil data keranjang dari sesi
          $cartItems = session()->get('cart', []);
          $totalPrice = 0;
  
          foreach ($cartItems as $item) {
              $totalPrice += $item['price'] * $item['quantity'];
          }
  
          // Pastikan keranjang tidak kosong
          if (empty($cartItems)) {
              return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
          }
  
          // Buat order baru di database
          $order = Order::create([
              'order_number' => 'ORD-' . strtoupper(uniqid()),
              'user_id' => Auth::id(),
          ]);
  
          // Simpan item-item dari keranjang ke dalam tabel order_items
          foreach ($cartItems as $item) {
              OrderItem::create([
                  'order_id' => $order->id,
                  'product_id' => $item['id'],
                  'quantity' => $item['quantity'],
                  'price' => $item['price'],
              ]);
          }
  
          // Kosongkan keranjang setelah pesanan berhasil
          session()->forget('cart');
          
  
          // Arahkan ke halaman sukses
          return redirect()->route('order.success')->with('success', 'Pesanan berhasil dibuat!');
      }
}
