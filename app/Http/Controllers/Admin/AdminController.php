<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function images()
    {
        return view('admin.images');
    }

    public function products()
    {
        return view('admin.products');
    }

    public function users()
    {
        return view('admin.users');
    }
}
