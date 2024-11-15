<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'category_id', // Menambahkan category_id ke fillable
    ];

    /**
     * Relasi: Produk memiliki satu kategori
     */
    public function category()
    {
        return $this->belongsTo(Category::class); // Satu produk memiliki satu kategori
    }
}