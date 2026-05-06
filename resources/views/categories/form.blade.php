@extends('layouts.app')

@section('title', $title . ' - Frozeria Stok')

@section('content')
    <div class="title-row" style="margin-bottom: 16px;">
        <a class="btn" href="{{ route('categories.index') }}">&lsaquo; Kembali</a>
        <h1>{{ $title }}</h1>
    </div>

    <form method="POST" action="{{ $category->exists ? route('categories.update', $category) : route('categories.store') }}" style="max-width: 540px;">
        @csrf
        @if ($category->exists)
            @method('PUT')
        @endif

        <div style="margin-bottom: 14px;">
            <label>Nama kategori <span class="required">*</span></label>
            <input type="text" name="nama" value="{{ old('nama', $category->nama) }}" required>
        </div>
        <div>
            <label>Deskripsi (opsional)</label>
            <textarea name="deskripsi" placeholder="Produk berbahan dasar ayam beku...">{{ old('deskripsi', $category->deskripsi) }}</textarea>
        </div>

        <div class="form-actions">
            <a class="btn" href="{{ route('categories.index') }}">Batal</a>
            <button class="btn btn-green" type="submit">Simpan Kategori</button>
        </div>
    </form>
@endsection
