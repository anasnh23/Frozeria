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
            $table->id();
            $table->foreignId('kategori_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('nama_barang');
            $table->unsignedInteger('jumlah_stok')->default(0);
            $table->unsignedInteger('stok_minimum')->default(20);
            $table->string('satuan', 30);
            $table->unsignedInteger('harga_jual');
            $table->unsignedInteger('harga_beli');
            $table->string('berat_ukuran')->nullable();
            $table->string('lokasi_simpan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
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
