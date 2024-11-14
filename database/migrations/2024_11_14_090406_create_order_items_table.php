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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');  // Foreign key
            $table->unsignedBigInteger('product_id');  // Foreign key
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            
            // Menambahkan foreign key untuk 'order_id' yang mengarah ke kolom 'id' di tabel 'orders'
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            
            // Menambahkan foreign key untuk 'product_id' yang mengarah ke kolom 'id' di tabel 'products'
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            $table->engine = 'InnoDB';  // Pastikan menggunakan engine InnoDB
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
