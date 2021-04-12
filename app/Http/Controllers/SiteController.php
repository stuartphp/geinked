<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function about()
    {
        return view('site.about_us');
    }
    public function contact()
    {
        return view('site.contact_us');
    }
    public function shop()
    {
        return view('site.shop');
    }
    public function cart()
    {
        return view('site.cart');
    }
    public function checkout()
    {
        return view('site.checkout');
    }
    
}
