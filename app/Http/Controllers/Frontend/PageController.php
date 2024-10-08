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
        $banners = Banner::where('is_active', 1)->orderBy('order_column', 'desc')->get();

        $sliders = $banners->where('section', 'slider');
        $featuredBanners = $banners->where('section', 'featured');

        $tags = Tag::all();


        $mostLovedProducts = Product::with([
            'variants:id,product_id,size,color,price,sku,stock',
            'categories'
            ])
            ->whereHas('variants')
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('stock_quantity', '>', 0)
                    ->orWhere('allow_out_of_stock_orders', 1);
            })
            ->inRandomOrder()
            ->take(20)
            ->get();

        // GET categories where show_on_home is true and get the products of those categories which are published and in stock and take 20 random products
        $latestProducts = Product::with([
            'variants:id,product_id,size,color,price,sku,stock',
            'categories'
            ])
            ->whereHas('categories', function ($query) {
                $query->where('show_on_home', 1);
            })
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('stock_quantity', '>', 0)
                    ->orWhere('allow_out_of_stock_orders', 1);
            })
            ->inRandomOrder()
            ->take(20)
            ->get();

        // now group the products by category
        $latestProducts = $latestProducts->groupBy('categories.0.id');

        return view('frontend.pages.home', compact('categories', 'products', 'banners', 'tags', 'sliders', 'featuredBanners', 'mostLovedProducts', 'latestProducts', 'latestProducts'));
    }

    public function categoryProduct($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (! $category) {
            abort(404);
        }
        $products = $category->products()->where('status', 'published')->get();
        $tags = Tag::all();

        return view('frontend.pages.category-product', compact('category', 'products', 'tags'));
    }

    public function productDetail($slug)
    {
        $product = Product::with(['variants', 'categories', 'images'])->where('slug', $slug)->first();

        // if product not found then show 404 page
        if (! $product) {
            abort(404);
        }

        $relatedProducts = $product->categories;
        $tags = Tag::all();
        $pageTitle = $product->name;

        return view('frontend.pages.product-detail', compact('product', 'relatedProducts', 'tags', 'pageTitle'));
    }
}
