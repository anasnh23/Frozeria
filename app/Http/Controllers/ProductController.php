<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('nama_barang', 'like', '%' . $request->q . '%');
            })
            ->when($request->filled('kategori_id'), function ($query) use ($request) {
                $query->where('kategori_id', $request->kategori_id);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('products.index', [
            'products' => $products,
            'categories' => Category::orderBy('nama')->get(),
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'lowStockCount' => Product::whereColumn('jumlah_stok', '<', 'stok_minimum')->where('jumlah_stok', '>', 0)->count(),
            'emptyStockCount' => Product::where('jumlah_stok', 0)->count(),
        ]);
    }

    public function create()
    {
        return view('products.form', [
            'product' => new Product(['stok_minimum' => 20]),
            'categories' => Category::orderBy('nama')->get(),
            'title' => 'Tambah Barang Baru',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('foto_upload')) {
            $data['foto'] = $request->file('foto_upload')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.form', [
            'product' => $product,
            'categories' => Category::orderBy('nama')->get(),
            'title' => 'Edit Barang',
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('foto_upload')) {
            if ($product->foto) {
                Storage::disk('public')->delete($product->foto);
            }

            $data['foto'] = $request->file('foto_upload')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.show', $product)->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'exists:categories,id'],
            'satuan' => ['required', 'string', 'max:30'],
            'jumlah_stok' => ['required', 'integer', 'min:0'],
            'stok_minimum' => ['nullable', 'integer', 'min:0'],
            'harga_jual' => ['required', 'integer', 'min:0'],
            'harga_beli' => ['required', 'integer', 'min:0'],
            'berat_ukuran' => ['nullable', 'string', 'max:255'],
            'lokasi_simpan' => ['nullable', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'foto_upload' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);
    }
}
