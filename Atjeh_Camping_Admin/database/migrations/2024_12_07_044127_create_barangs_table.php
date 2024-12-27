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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            
            $table->string('nama'); // VARCHAR(150) Nama produk.
            $table->text('deskripsi'); // TEXT Deskripsi produk.
            $table->integer('harga'); // DECIMAL(10, 2) Harga produk.
            $table->integer('stok_barang', ); // DECIMAL(10, 2) Harga produk.
            $table->string('image_url'); // VARCHAR(255) URL gambar produk.
            $table->string('merk'); // VARCHAR(100) Merek produk.
            $table->string('kategori'); // VARCHAR(100) Merek produk.
            $table->string('is_jual'); // VARCHAR(100) Merek produk.

            // $table->foreignId('category_id')->nullable()->constrained('categories'); // BIGINT (FK) Relasi ke tabel kategori.
            $table->timestamps(); // TIMESTAMP Waktu pembuatan dan terakhir diperbarui.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
