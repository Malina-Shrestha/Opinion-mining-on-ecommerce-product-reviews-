<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $admins = Admin::count();
        $categories = Category::count();
        $products = Product::count();
        $users = User::count();

       return view('back.home.index', compact('admins', 'categories', 'products', 'users'));
    }


}
