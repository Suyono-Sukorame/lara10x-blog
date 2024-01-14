<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'is_active' => 'sometimes',
        ]);

        // Inisialisasi variabel path dan filename
        $path = '';
        $filename = '';

        // Handle upload gambar
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->getClientOriginalExtension());
            
            $filename = time() . '.' . $extension;
            $path = 'uploads/products/';

            $file->move($path, $filename);
        }

        // Simpan data produk
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path . $filename,
            'is_active' => $request->boolean('is_active'),
        ]);

        // Redirect dengan pesan sukses
        return redirect('product/create')->with('status', 'Product Added');
    }

    public function edit(int $id)
    {
        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, int $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'is_active' => 'sometimes',
        ]);

        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Handle upload gambar
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->getClientOriginalExtension());

            $filename = time() . '.' . $extension;
            $path = 'uploads/products/';

            $file->move($path, $filename);

            // Hapus file gambar lama
            if (File::exists($product->image)) {
                File::delete($product->image);
            }
        }

        // Update data produk
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path . $filename,
            'is_active' => $request->boolean('is_active'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('status', 'Product updated successfully');
    }

    public function destroy(int $id)
    {
        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus file gambar
        if (File::exists($product->image)) {
            File::delete($product->image);
        }

        // Hapus data produk
        $product->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('status', 'Product deleted successfully');
    }
}
