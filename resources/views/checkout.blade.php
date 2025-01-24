<!-- Menyematkan CSS langsung di file PHP -->
<style>
    /* Mengatur ukuran gambar agar lebih kecil dan proporsional */
    .cart_item_img {
        max-width: 150px; /* Batas maksimal lebar gambar */
        height: auto; /* Menjaga proporsi gambar */
        object-fit: cover; /* Menyesuaikan gambar agar sesuai dengan ukuran */
        margin-right: 15px; /* Memberi jarak antara gambar dan teks */
    }

    /* Menambahkan styling untuk konten keranjang */
    .cart_item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .cart_items {
        display: flex;
        flex-direction: column;
    }

    h4 {
        margin-top: 20px;
        font-weight: bold;
    }

    .cart_button_checkout {
        background-color: #4CAF50; /* Warna hijau */
        color: white;
        padding: 10px 20px;
        text-align: center;
        border: none;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
    }

    .cart_button_checkout:hover {
        background-color: #45a049;
    }
</style>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Menampilkan item keranjang jika ada -->
@if(!empty($cartItems))
    <div class="cart_items">
        @foreach ($cartItems as $item)
            <div class="cart_item">
                <img src="{{ asset('storage/products/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 100px;">
                <h5>{{ $item['name'] }}</h5>
                <p>Qty: {{ $item['quantity'] }}</p>
                <p>Rp. {{ number_format($item['price'], 2) }}</p>
            </div>
        @endforeach
    </div>

    <h4>Total Pembelian: Rp. {{ number_format($totalPrice, 2) }}</h4>

    <!-- Tombol Checkout -->
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <button type="submit" class="button cart_button_checkout">Checkout</button>
    </form>
@else
    <p>Keranjang kosong. Silakan tambahkan produk ke keranjang.</p>
@endif

