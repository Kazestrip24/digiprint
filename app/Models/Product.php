<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'category_id', 'image', // Menambahkan category_id ke fillable
    ];

    // Manipulasi nama file sebelum menyimpan
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if ($product->isDirty('image') && $product->image) {
                // Hanya simpan nama file tanpa folder 'products/'
                $product->image = pathinfo($product->image, PATHINFO_BASENAME);
            }
        });
    }
    /**
     * Relasi: Produk memiliki satu kategori
     */
    public function category()
    {
        return $this->belongsTo(Category::class); // Satu produk memiliki satu kategori
    }
}