<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $products = Product::get();
        $data = [
            'title' => 'Yono Web Developer',
            'date' => date('m/d/y'),
            'products' => $products,
        ];
        $pdf = Pdf::loadView('product.generate-product-pdf', $data);
        return $pdf->download('yono-product-data.pdf');
    }
}
