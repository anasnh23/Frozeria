@extends('layouts.app')

@section('title', 'Dashboard - Frozeria Stok')

@section('nav-action')
    <a class="btn btn-dark" href="{{ route('products.create') }}">+ Tambah Barang</a>
@endsection

@section('content')
    <div class="cards">
        <div class="stat-card">
            <div class="stat-label">Total barang</div>
            <div class="stat-value">{{ $totalProducts }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Total kategori</div>
            <div class="stat-value">{{ $totalCategories }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Stok menipis</div>
            <div class="stat-value">{{ $lowStockCount }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Stok habis</div>
            <div class="stat-value">{{ $emptyStockCount }}</div>
        </div>
    </div>

    <form class="filters" method="GET" action="{{ route('products.index') }}">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama barang...">
        <select name="kategori_id" onchange="this.form.submit()">
            <option value="">Semua kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) request('kategori_id') === (string) $category->id)>{{ $category->nama }}</option>
            @endforeach
        </select>
        <button class="btn" type="submit">Cari</button>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nama barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->nama_barang }}</td>
                        <td><span class="tag">{{ $product->category?->nama ?? 'Tanpa kategori' }}</span></td>
                        <td>{{ $product->jumlah_stok }}</td>
                        <td>{{ $product->satuan }}</td>
                        <td>Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                        <td>
                            <div class="table-actions">
                                <a class="btn" href="{{ route('products.show', $product) }}">Detail</a>
                                <a class="btn btn-blue" href="{{ route('products.edit', $product) }}">Edit</a>
                                <button class="btn btn-red" type="button"
                                    data-delete-url="{{ route('products.destroy', $product) }}"
                                    data-delete-title="Hapus barang?"
                                    data-delete-message="Data <strong>{{ e($product->nama_barang) }}</strong> akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="muted">Data barang tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <div class="muted">
            @if ($products->total())
                Menampilkan {{ $products->firstItem() }}-{{ $products->lastItem() }} dari {{ $products->total() }} barang
            @else
                Menampilkan 0 barang
            @endif
        </div>
        <div class="pagination">
            @if ($products->onFirstPage())
                <span>&lt; Prev</span>
            @else
                <a href="{{ $products->previousPageUrl() }}">&lt; Prev</a>
            @endif

            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if ($page === $products->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}">Next &gt;</a>
            @else
                <span>Next &gt;</span>
            @endif
        </div>
    </div>
@endsection
