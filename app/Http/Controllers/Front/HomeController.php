<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', 'yes')->take(4)->get();

        $latestProducts = Product::latest()->take(4)->get();

        $topProducts = Product::withCount('order_details')->orderBy('order_details_count', 'DESC')->take(4)->get();

        return view('front.home.index', compact('featuredProducts', 'latestProducts', 'topProducts'));
    }

    public function about()
    {
        return view('front.about');
    }
}
