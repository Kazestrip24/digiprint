<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
        use HasFactory;
        protected $table = 'settings';
        // Menentukan kolom yang bisa diisi
        protected $fillable = [
            'banner_text',
            'banner_image',
        ];

        public function index()
{
    $setting = Setting::first(); // Ambil setting pertama dari tabel
    return view('index', compact('setting'));
}
}
