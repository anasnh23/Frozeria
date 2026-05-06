@extends('layouts.app')

@section('title', 'Kategori - Frozeria Stok')

@section('nav-action')
    <a class="btn btn-dark" href="{{ route('categories.create') }}">+ Tambah Kategori</a>
@endsection

@section('content')
    <h1 style="margin-bottom: 14px;">Daftar Kategori</h1>

    <form method="GET" action="{{ route('categories.index') }}" style="margin-bottom: 12px;">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari kategori..." onkeydown="if(event.key === 'Enter') this.form.submit()">
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nama kategori</th>
                    <th>Jumlah barang</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->nama }}</td>
                        <td>{{ $category->products_count }} barang</td>
                        <td>{{ $category->created_at->translatedFormat('j M Y') }}</td>
                        <td>
                            <div class="table-actions">
                                <a class="btn btn-blue" href="{{ route('categories.edit', $category) }}">Edit</a>
                                <button class="btn btn-red" type="button"
                                    data-delete-url="{{ route('categories.destroy', $category) }}"
                                    data-delete-title="Hapus kategori?"
                                    data-delete-message="Kategori <strong>{{ e($category->nama) }}</strong> akan dihapus. Barang pada kategori ini akan menjadi tidak berkategori.">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="muted">Data kategori tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="muted" style="margin-top: 14px;">{{ $categories->count() }} kategori terdaftar</div>
@endsection
