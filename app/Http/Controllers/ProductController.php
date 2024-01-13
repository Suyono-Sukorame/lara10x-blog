<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create()
    {
        return view('frontend.products-create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'is_active' => 'sometimes',
        ]);

        if ($validator->fails()) {
            return redirect('/products/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // $product = new Product();
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // $product->is_active = $request->is_active == true ? 1 : 0;
        // $product->save();

        // Product::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1 : 0,
        // ]);
        
        // Product::create($request->all());

        // $product = new Product([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1 : 0,
        // ]);
        // $product->save();

        // Product::firstOrCreate(
        //     ['name' => $request->name],
        //     [
        //         'description' => $request->description,
        //         'price' => $request->price,
        //         'stock' => $request->stock,
        //         'is_active' => $request->is_active == true ? 1 : 0,
        //     ]
        // );

        $product = new Product();
        $product->fill($request->all());
        $product->is_active = $request->is_active == true ? 1 : 0;
        $product->save();


        return redirect('/products/create')->with('status', 'Product Added');
    }
}
