<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index($slug)
    {
        // $popular = Product::where()->get();
        $product = Product::with(['category', 'options', 'unit', 'images', 'reviews'])->where('slug', $slug)->first();

        DB::table('products')->where('id', $product->id)->increment('viewed', 1);
        //dd($product);
        return view('products.detail', compact('product'));
    }

    public function category($cat,$slug='')
    {

        return view('products.category', compact('cat','slug'));
    }
}
