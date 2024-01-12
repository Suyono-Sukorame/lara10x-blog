<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('frontend.products-create');
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
    }
}
