<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description',
    ];

    /**
     * Relasi: Kategori memiliki banyak produk
     */
    public function products()
    {
        return $this->hasMany(Product::class); // Satu kategori memiliki banyak produk
    }
}