@extends('layouts.app')

@section('title', 'Detail Barang - Frozeria Stok')

@section('content')
    <div class="detail-head">
        <div class="title-row">
            <a class="btn" href="{{ route('products.index') }}">&lsaquo; Kembali</a>
            <h1>Detail Barang</h1>
        </div>
        <div class="table-actions">
            <a class="btn btn-blue" href="{{ route('products.edit', $product) }}">Edit Barang</a>
            <button class="btn btn-red" type="button"
                data-delete-url="{{ route('products.destroy', $product) }}"
                data-delete-title="Hapus barang?"
                data-delete-message="Data <strong>{{ e($product->nama_barang) }}</strong> akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.">
                Hapus
            </button>
        </div>
    </div>

    <div class="detail-main">
        <div class="photo-box">
            @if ($product->foto)
                <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_barang }}">
            @else
                <span>&#9633;</span>
            @endif
        </div>
        <div>
            <h1>{{ $product->nama_barang }}</h1>
            <div style="margin-top: 12px;"><span class="tag">{{ $product->category?->nama ?? 'Tanpa kategori' }}</span></div>
        </div>
    </div>

    <div class="info-grid">
        <div class="info-box">
            <div class="info-label">Jumlah stok</div>
            <div class="info-value">{{ $product->jumlah_stok }} {{ $product->satuan }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Stok minimum</div>
            <div class="info-value">{{ $product->stok_minimum }} {{ $product->satuan }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Harga jual</div>
            <div class="info-value">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Harga beli</div>
            <div class="info-value">Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Berat / ukuran</div>
            <div class="info-value">{{ $product->berat_ukuran ?: '-' }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Lokasi simpan</div>
            <div class="info-value">{{ $product->lokasi_simpan ?: '-' }}</div>
        </div>
    </div>

    <div class="description-box">
        <div class="info-label">Deskripsi</div>
        <div>{{ $product->deskripsi ?: '-' }}</div>
    </div>
@endsection
