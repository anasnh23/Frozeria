@extends('layouts.app')

@section('title', 'Bantuan - Frozeria Stok')

@section('content')
    <h1 style="margin-bottom: 14px;">Panduan Penggunaan Sistem</h1>

    <section class="help-box">
        <h2>Cara menambah barang baru</h2>
        <ol class="steps">
            <li><span class="num">1</span><span>Buka halaman <strong>Dashboard</strong>, klik tombol <strong>+ Tambah Barang</strong> di kanan atas.</span></li>
            <li><span class="num">2</span><span>Unggah foto barang (opsional), lalu isi formulir: nama, kategori, satuan, jumlah stok, harga, dan lainnya.</span></li>
            <li><span class="num">3</span><span>Klik <strong>Simpan Barang</strong>. Barang akan muncul di daftar dashboard.</span></li>
        </ol>
    </section>

    <section class="help-box">
        <h2>Cara update stok barang masuk</h2>
        <ol class="steps">
            <li><span class="num">1</span><span>Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</span></li>
            <li><span class="num">2</span><span>Klik tombol <strong>Edit</strong> pada baris barang tersebut.</span></li>
            <li><span class="num">3</span><span>Ubah nilai <strong>Jumlah stok</strong> sesuai kondisi saat ini, lalu klik <strong>Simpan Barang</strong>.</span></li>
        </ol>
    </section>

    <section class="help-box">
        <h2>Cara mengelola kategori</h2>
        <ol class="steps">
            <li><span class="num">1</span><span>Buka halaman <strong>Kategori</strong> dari navigasi atas.</span></li>
            <li><span class="num">2</span><span>Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</span></li>
            <li><span class="num">3</span><span>Menghapus kategori tidak akan menghapus barang, barang akan menjadi tidak berkategori.</span></li>
        </ol>
    </section>

    <section class="note-box">
        <strong>&#9432;</strong>
        Satuan barang diisi bebas sesuai kebutuhan, misalnya: <strong>pcs, pack, box, kg, liter</strong>, dan lain-lain.
    </section>

    <section class="help-box" style="margin-top: 14px;">
        <h2>Data Diri</h2>
        <div class="profile">
            <strong>Nama</strong><span class="colon">:</span><span>Anas Nur Hidayat</span>
            <strong>NIM</strong><span class="colon">:</span><span>2241760069</span>
            <strong>Kelas</strong><span class="colon">:</span><span>4D</span>
            <strong>Alamat</strong><span class="colon">:</span><span>Jl Letqol istiklah Gg.mawar</span>
            <strong>Nomor Telepon</strong><span class="colon">:</span><span>+6283857721737</span>
            <strong>Email</strong><span class="colon">:</span><span>anasnurhidayat70@gmail.com</span>
        </div>
    </section>
@endsection
