<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    // public function store(Request $request)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'is_active' => 'sometimes',
        ]);

        $path = ''; // Inisialisasi variabel $path

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/products/';
            $file->move($path, $filename);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path . $filename,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);

        return redirect('products/create')->with('status', 'Product Added');
    }
}
