<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'jumlah_stok',
        'stok_minimum',
        'satuan',
        'harga_jual',
        'harga_beli',
        'berat_ukuran',
        'lokasi_simpan',
        'deskripsi',
        'foto',
    ];

    protected function casts(): array
    {
        return [
            'jumlah_stok' => 'integer',
            'stok_minimum' => 'integer',
            'harga_jual' => 'integer',
            'harga_beli' => 'integer',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
