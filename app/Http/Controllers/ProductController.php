<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('updated_at', 'desc')->get();
        $categories = Category::all();
        return view('pages.product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('addProduct', [
            'name' => 'required|string|min:3|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($validated);

        return redirect()->route('product.index')->with('addProduct.success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showAjax(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        
        $validated = $request->validateWithBag('updateProduct', [
            'name' => 'required|string|min:3|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($validated);

        return redirect()->route('product.index')->with('updateProduct.success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('deleteProduct.success', 'Produk berhasil dihapus');
    }


}
