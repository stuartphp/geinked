<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($slug)
    {
        // $popular = Product::where()->get();
        $product = Product::with(['category'])->where('slug', $slug)->first();
        //dd($product);
        return view('products.detail', compact('product'));
    }

    public function category($cat,$slug='')
    {

        return view('products.category', compact('cat','slug'));
    }
}
