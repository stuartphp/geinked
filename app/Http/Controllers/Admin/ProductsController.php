<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function detail($id)
    {
        return view('admin.products.detail', ['id'=>$id]);
    }
}
