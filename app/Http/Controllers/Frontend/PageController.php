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
        $mostLovedProducts = Product::with(['variants', 'categories'])->where('status', 'published')->inRandomOrder()->take(20)->get();

        return view('frontend.pages.home', compact('categories', 'products', 'banners', 'tags', 'sliders', 'featuredBanners', 'mostLovedProducts'));
    }

    public function categoryProduct($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        $products = $category->products()->where('status', 'published')->get();
        $tags = Tag::all();
        return view('frontend.pages.category-product', compact('category', 'products', 'tags'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();

        // if product not found then show 404 page
        if (!$product) {
            abort(404);
        }
        $relatedProducts = $product->categories;
        $tags = Tag::all();
        return view('frontend.pages.product-detail', compact('product', 'relatedProducts', 'tags'));
    }
}
