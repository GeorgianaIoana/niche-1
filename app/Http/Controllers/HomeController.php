<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::query()
            ->with('category')
            ->featured()
            ->inStock()
            ->limit(4)
            ->get();

        $newArrivals = Product::query()
            ->with('category')
            ->newArrivals()
            ->inStock()
            ->limit(4)
            ->get();

        $categories = Category::all();

        return view('pages.home', compact('featuredProducts', 'newArrivals', 'categories'));
    }

    public function about(): View
    {
        return view('pages.about');
    }
}
