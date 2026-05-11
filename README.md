# Frozeria Stok

Frozeria Stok adalah aplikasi website untuk mengelola stok makanan beku pada toko **Frozeria**. Aplikasi ini dibuat untuk kebutuhan praktik pemrograman dengan fitur utama CRUD barang, CRUD kategori, pencarian, filter kategori, detail barang, upload foto, dan dashboard stok.

## Identitas

| Data | Keterangan |
| --- | --- |
| Nama | Anas Nur Hidayat |
| NIM | 2241760069 |
| Kelas | 4D |
| Alamat | Jl Letqol istiklah Gg.mawar |
| Nomor Telepon | +6283857721737 |
| Email | anasnurhidayat70@gmail.com |

## Teknologi

- Laravel
- PHP
- MySQL
- Blade Template
- Laravel Eloquent ORM
- Laravel Migration dan Seeder
- Laravel Storage untuk upload foto

## Fitur Aplikasi

- Dashboard daftar barang.
- Card informasi total barang, total kategori, stok menipis, dan stok habis.
- Pencarian barang berdasarkan nama barang.
- Filter barang berdasarkan kategori.
- Tambah barang baru.
- Edit barang dan update stok.
- Upload serta preview foto barang.
- Detail barang beserta foto.
- Konfirmasi hapus menggunakan modal.
- Manajemen kategori: tambah, edit, hapus.
- Halaman bantuan berisi panduan penggunaan sistem dan data diri.

## Struktur Database

Database yang digunakan bernama:

```text
frozeria
```

### Tabel `categories`

| Kolom | Keterangan |
| --- | --- |
| id | Primary key kategori |
| nama | Nama kategori |
| deskripsi | Deskripsi kategori |
| created_at | Tanggal data dibuat |
| updated_at | Tanggal data diperbarui |

### Tabel `products`

| Kolom | Keterangan |
| --- | --- |
| id | Primary key barang |
| kategori_id | Foreign key ke tabel categories |
| nama_barang | Nama barang |
| jumlah_stok | Jumlah stok barang |
| stok_minimum | Batas minimum stok |
| satuan | Satuan barang |
| harga_jual | Harga jual barang |
| harga_beli | Harga beli barang |
| berat_ukuran | Berat atau ukuran barang |
| lokasi_simpan | Lokasi penyimpanan barang |
| deskripsi | Deskripsi barang |
| foto | Path foto barang |
| created_at | Tanggal data dibuat |
| updated_at | Tanggal data diperbarui |

## Relasi Database

Relasi yang digunakan adalah **one-to-many**:

- Satu kategori memiliki banyak barang.
- Satu barang berada dalam satu kategori.
- Jika kategori dihapus, barang tidak ikut terhapus dan `kategori_id` menjadi kosong.

Contoh relasi pada model:

```php
// Category.php
return $this->hasMany(Product::class, 'kategori_id');

// Product.php
return $this->belongsTo(Category::class, 'kategori_id');
```

## Instalasi

1. Clone repository:

```bash
git clone https://github.com/anasnh23/Frozeria.git
cd Frozeria
```

2. Install dependency:

```bash
composer install
```

3. Salin file environment:

```bash
copy .env.example .env
```

4. Generate application key:

```bash
php artisan key:generate
```

5. Atur koneksi database pada `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=frozeria
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan migration dan seeder:

```bash
php artisan migrate:fresh --seed
```

7. Buat storage link untuk foto barang:

```bash
php artisan storage:link
```

8. Jalankan server:

```bash
php artisan serve
```

9. Buka aplikasi:

```text
http://127.0.0.1:8000/products
```

## Data Awal Seeder

Seeder menyediakan data awal untuk kebutuhan demo:

| Data | Jumlah |
| --- | ---: |
| Kategori | 5 |
| Barang | 48 |
| Stok menipis | 9 |
| Stok habis | 4 |

## Alur Program

Aplikasi menggunakan pola **MVC** pada Laravel:

- **Route** menerima request dari browser.
- **Controller** memproses logika, validasi, tambah, edit, hapus, pencarian, dan filter.
- **Model** berhubungan dengan database.
- **Blade** menampilkan data ke halaman website.

Route utama:

```php
Route::redirect('/', '/products');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class)->except('show');
Route::view('/help', 'help')->name('help');
```

## Kesesuaian Skema Kompetensi

| Unit Kompetensi | Implementasi |
| --- | --- |
| Menggunakan Library atau Komponen Pre-existing | Menggunakan Laravel, Blade, Eloquent, Validation, Storage, dan Pagination |
| Mengimplementasikan Pemrograman Terstruktur | Memiliki alur CRUD, pencarian, filter, validasi, dan route yang jelas |
| Mengimplementasikan Pemrograman Berorientasi Objek | Menggunakan class Model dan Controller |
| Membuat Dokumen Kode Program | Tersedia README dan laporan PDF |
| Melakukan Debugging | Sudah dilakukan pengujian dengan `php artisan test` |
| Menggunakan SQL | Menggunakan MySQL, migration, relasi foreign key, query pencarian, dan filter |

## Testing

Jalankan pengujian dengan perintah:

```bash
php artisan test
```

Hasil terakhir:

```text
2 passed
```
