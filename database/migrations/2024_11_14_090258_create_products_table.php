<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Tipe data 'unsignedBigInteger' secara default
            $table->unsignedBigInteger('category_id');  // Foreign key
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            
            // Menambahkan foreign key yang mengarah ke kolom 'id' di tabel 'categories'
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->engine = 'InnoDB';  // Pastikan menggunakan engine InnoDB
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
