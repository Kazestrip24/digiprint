<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Menambahkan kolom user_id
            $table->unsignedBigInteger('user_id')->nullable()->after('order_number');
            
            // Jika menggunakan relasi ke tabel 'users', tambahkan constraint foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Menghapus kolom user_id
            $table->dropColumn('user_id');
        });
    }
    
};
