<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;

// Add this line
use App\Models\Product;

// Add this line
use App\Models\Tag;

// Add this line
use Illuminate\Http\Request;

// Add this line

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('is_active', 1)->get();
        $products = Product::where('status', 'published')->get();
        $banners = Banner::where('is_active', 1)->get();

        $sliders = $banners->where('section', 'slider');
        $featuredBanners = $banners->where('section', 'featured');

        $tags = Tag::all();

        // most popular products random product take 20
        $mostLovedProducts = Product::where('status', 'published')->inRandomOrder()->take(20)->get();

        return view('frontend.pages.home', compact('categories', 'products', 'banners', 'tags', 'sliders', 'featuredBanners', 'mostLovedProducts'));
    }
}
