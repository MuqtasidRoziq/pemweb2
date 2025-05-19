<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pest\ArchPresets\Custom;
use App\Models\Products;
use App\Models\ProductCategories;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        $categories = ProductCategories::all();
        return view('dashboard.products.index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategories::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string|unique:products,sku|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_category_id' => 'nullable|exists:product_categories,id',
            'image_url' => 'nullable|url',
            'is_active' => 'required|in:0,1',
        ]);

        // Konversi is_active ke boolean
        $validated['is_active'] = (bool) $validated['is_active'];

        try {
            Products::create($validated);
            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            \Log::error('Error in store: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan produk. Cek log untuk detail.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Products::where('slug',$slug)->firstOrFail();
        $categories = ProductCategories::all();
        return view('dashboard.products.show-product', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        $categories = ProductCategories::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data dari formulir
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $id . '|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string|unique:products,sku,' . $id . '|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'product_category_id' => 'nullable|exists:product_categories,id',
            'image_url' => 'nullable|url',
            'is_active' => 'required|in:0,1',
        ]);

        // Konversi is_active ke boolean
        $validated['is_active'] = (bool) $validated['is_active'];

        try {
            $product = Products::findOrFail($id);
            $product->update($validated);
            return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error('Error in update: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui produk. Cek log untuk detail.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Products::findOrFail($id);
            $product->delete();
            return redirect()->route('dashboard.products.index')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error in destroy: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus produk. Cek log untuk detail.');
        }
    }
}
