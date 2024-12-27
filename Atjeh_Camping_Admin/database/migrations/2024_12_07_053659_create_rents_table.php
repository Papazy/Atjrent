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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('users_id');
            $table->string('nama_keranjang', 255);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('tujuan_sewa');
            $table->integer('harga_total');
            $table->string('status');
            $table->string('snap_token')->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
