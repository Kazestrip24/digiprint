<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil kategori yang sudah ada
    $kertas = Category::where('name', 'Kertas')->first();
    $spanduk = Category::where('name', 'Spanduk')->first();
    $sticker = Category::where('name', 'Sticker')->first();

    // Tambahkan produk ke dalam kategori yang sudah ada
    Product::create([
        'name' => 'Kertas A4 Premium',
        'description' => 'Kertas A4 kualitas premium untuk percetakan profesional.',
        'price' => 100000,
        'category_id' => $kertas->id,
        'image' => 'kertas_a4_premium.jpg', // pastikan file ada di storage/public/products
    ]);

    Product::create([
        'name' => 'Kertas A4 Ekonomis',
        'description' => 'Kertas A4 dengan harga terjangkau untuk penggunaan sehari-hari.',
        'price' => 75000,
        'category_id' => $kertas->id,
        'image' => 'kertas_a4_ekonomis.jpg',
    ]);

    Product::create([
        'name' => 'Spanduk Custom 1x2m',
        'description' => 'Spanduk custom dengan bahan vinyl berkualitas tinggi.',
        'price' => 300000,
        'category_id' => $spanduk->id,
        'image' => 'spanduk_1x2m.jpg',
    ]);

    Product::create([
        'name' => 'Spanduk Banner 2x3m',
        'description' => 'Spanduk banner besar untuk acara atau promosi.',
        'price' => 500000,
        'category_id' => $spanduk->id,
        'image' => 'spanduk_2x3m.jpg',
    ]);

    Product::create([
        'name' => 'Sticker Vinyl 10x10cm',
        'description' => 'Sticker vinyl untuk kebutuhan promosi dan branding.',
        'price' => 20000,
        'category_id' => $sticker->id,
        'image' => 'sticker_vinyl_10x10.jpg',
    ]);

    Product::create([
        'name' => 'Sticker Dinding 30x30cm',
        'description' => 'Sticker dinding dengan bahan berkualitas, cocok untuk dekorasi.',
        'price' => 35000,
        'category_id' => $sticker->id,
        'image' => 'sticker_dinding_30x30.jpg',
    ]);

    Product::create([
        'name' => 'Brosur A4 Full Color',
        'description' => 'Brosur A4 dengan cetakan full color, cocok untuk kebutuhan promosi.',
        'price' => 15000,
        'category_id' => $kertas->id,
        'image' => 'brosur_a4_fullcolor.jpg',
    ]);

    Product::create([
        'name' => 'Banner PVC 3x5m',
        'description' => 'Banner PVC dengan ukuran besar untuk iklan luar ruangan.',
        'price' => 700000,
        'category_id' => $spanduk->id,
        'image' => 'banner_pvc_3x5m.jpg',
    ]);
    }
}
