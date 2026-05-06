<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->q . '%');
            })
            ->orderBy('nama')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.form', [
            'category' => new Category(),
            'title' => 'Tambah Kategori',
        ]);
    }

    public function store(Request $request)
    {
        Category::create($this->validatedData($request));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('categories.form', [
            'category' => $category,
            'title' => 'Edit Kategori',
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($this->validatedData($request, $category));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Category $category = null): array
    {
        $ignoreId = $category?->id ? ',' . $category->id : '';

        return $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:categories,nama' . $ignoreId],
            'deskripsi' => ['nullable', 'string'],
        ]);
    }
}
