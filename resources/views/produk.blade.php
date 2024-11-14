@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-4xl font-bold text-center mb-6">Produk Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <img src="https://via.placeholder.com/300x200" alt="Produk 1" class="mb-4 rounded-lg">
            <h3 class="text-2xl font-semibold">Cetak Kartu Nama</h3>
            <p class="mb-4">Rp 50.000 untuk 100 kartu nama.</p>
            <a href="#" class="text-blue-600 hover:underline">Pesan Sekarang</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <img src="https://via.placeholder.com/300x200" alt="Produk 2" class="mb-4 rounded-lg">
            <h3 class="text-2xl font-semibold">Banner Promosi</h3>
            <p class="mb-4">Rp 150.000 untuk ukuran 2x3m.</p>
            <a href="#" class="text-blue-600 hover:underline">Pesan Sekarang</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <img src="https://via.placeholder.com/300x200" alt="Produk 3" class="mb-4 rounded-lg">
            <h3 class="text-2xl font-semibold">Desain Grafis</h3>
            <p class="mb-4">Mulai dari Rp 100.000 untuk desain grafis.</p>
            <a href="#" class="text-blue-600 hover:underline">Pesan Sekarang</a>
        </div>
    </div>
</div>
@endsection
