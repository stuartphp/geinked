<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($slug)
    {
        // $popular = Product::where()->get();
        $product = Product::where('slug', $slug)->first();
        return view('products.detail', compact('product'));
    }
}
