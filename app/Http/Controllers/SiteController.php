<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;


class SiteController extends Controller
{
    public function __construct()
    {
        $minutes = 10080; // Week
        $cookie = cookie('name', 'value', $minutes);   
    }

    public function index()
    {
        return view('welcome');
    }
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
    public function privacy()
    {
        return view('site.privacy');
    }
    public function terms()
    {
        return view('site.terms');
    }
    public function return()
    {
        return view('site.return');
    }

}
