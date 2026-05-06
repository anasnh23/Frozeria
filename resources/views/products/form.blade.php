@extends('layouts.app')

@section('title', $title . ' - Frozeria Stok')

@section('content')
    <div class="title-row" style="margin-bottom: 16px;">
        <a class="btn" href="{{ url()->previous() === url()->current() ? route('products.index') : url()->previous() }}">&lsaquo; Kembali</a>
        <h1>{{ $title }}</h1>
    </div>

    <form method="POST" action="{{ $product->exists ? route('products.update', $product) : route('products.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($product->exists)
            @method('PUT')
        @endif

        <div class="form-full" style="margin-bottom: 14px;">
            <label>Foto barang</label>
            <label class="upload">
                <img
                    id="fotoPreview"
                    class="upload-preview"
                    src="{{ $product->foto ? asset('storage/' . $product->foto) : '' }}"
                    alt="Preview foto barang"
                    @if (! $product->foto) hidden @endif
                >
                <span class="upload-icon" @if ($product->foto) style="display: none;" @endif>&#9633;</span>
                <span>Klik untuk memilih foto, atau seret file ke sini</span>
                <small>Format: JPG, PNG - Maks. 2 MB</small>
                <span class="btn">Pilih Foto</span>
                <input
                    type="file"
                    name="foto_upload"
                    accept="image/png,image/jpeg"
                    style="display: none;"
                    data-photo-input="#fotoPreview"
                    data-filename-target="#fotoName"
                >
            </label>
            <div class="muted" id="fotoName" style="margin-top: 7px;">
                @if ($product->foto)
                    Foto saat ini: {{ $product->foto }}
                @endif
            </div>
        </div>

        <div class="form-grid">
            <div class="form-full">
                <label>Nama barang <span class="required">*</span></label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $product->nama_barang) }}" required>
            </div>
            <div>
                <label>Kategori <span class="required">*</span></label>
                <select name="kategori_id" required>
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) old('kategori_id', $product->kategori_id) === (string) $category->id)>{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Satuan <span class="required">*</span></label>
                <input type="text" name="satuan" value="{{ old('satuan', $product->satuan) }}" required>
            </div>
            <div>
                <label>Jumlah stok <span class="required">*</span></label>
                <input type="number" min="0" name="jumlah_stok" value="{{ old('jumlah_stok', $product->jumlah_stok) }}" required>
            </div>
            <div>
                <label>Stok minimum</label>
                <input type="number" min="0" name="stok_minimum" value="{{ old('stok_minimum', $product->stok_minimum) }}">
            </div>
            <div>
                <label>Harga jual (Rp)</label>
                <input type="number" min="0" name="harga_jual" value="{{ old('harga_jual', $product->harga_jual) }}" required>
            </div>
            <div>
                <label>Harga beli (Rp)</label>
                <input type="number" min="0" name="harga_beli" value="{{ old('harga_beli', $product->harga_beli) }}" required>
            </div>
            <div>
                <label>Berat / ukuran</label>
                <input type="text" name="berat_ukuran" value="{{ old('berat_ukuran', $product->berat_ukuran) }}">
            </div>
            <div>
                <label>Lokasi simpan</label>
                <input type="text" name="lokasi_simpan" value="{{ old('lokasi_simpan', $product->lokasi_simpan) }}">
            </div>
            <div class="form-full">
                <label>Deskripsi</label>
                <textarea name="deskripsi">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            </div>
        </div>

        <div class="form-actions">
            <a class="btn" href="{{ route('products.index') }}">Batal</a>
            <button class="btn btn-green" type="submit">Simpan Barang</button>
        </div>
    </form>
@endsection
