<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('front.home', compact('categories'));
    }

    public function Home()
    {
        $categories = Category::all();
        return view('front.home', compact('categories'));
    }
    public function filterCategory(Request $request)
    {
        $categories = Category::where($request->key, 'like', '%' . $request->val . '%')->get();
        return view('includes.categoryFilter', compact('categories'));
    }
}
