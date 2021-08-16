<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function family() {
        $products = Product::where('type', 'family')->get();
        return view('frontend.products.index', compact('products'));
    }

    public function general() {
        $products = Product::where('type', 'general')->get();
        return view('frontend.products.index', compact('products'));
    }

    public function show($id)
    {   
        $product = Product::where('id', $id)->firstOrFail();
        return view('frontend.products.show', ['product' => $product]);
    }
}
