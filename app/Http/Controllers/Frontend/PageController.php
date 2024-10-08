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

        // latest products with variants and categories relationship take 30 products
        $latestProducts = Product::with([
            'variants:id,product_id,size,color,price,sku,stock',
            'categories'
        ])
//            ->whereHas('variants')
            ->where('status', 'published')
            ->where(function ($query) {
                $query->where('stock_quantity', '>', 0)
                    ->orWhere('allow_out_of_stock_orders', 1);
            })
            ->latest()
            ->take(24)
            ->get();

        // product has multiple categories so we need to get unique categorie
        $latestCategories = Category::with([
                'products' => function ($query) {
                    $query->where('status', 'published');
                    $query->take(24);
                }
            ])
            ->where('show_on_home', 1)
            ->whereHas('products', function ($query) {
                $query->where('status', 'published');
            })
            ->take(6)
            ->get();

        return view('frontend.pages.home', compact('categories', 'products', 'banners', 'tags', 'sliders', 'featuredBanners', 'mostLovedProducts', 'latestProducts', 'latestCategories'));
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
        $product = Product::with(['variants', 'categories', 'images'])->where('slug', $slug)->first();
      
        // if product not found then show 404 page
        if (!$product) {
            abort(404);
        }

        $relatedCategories = $product->categories;
        // [{"id":20,"name":"Whipped Shea Butter","slug":"whipped-shea-butter","order_column":19,"is_active":1,"is_menu":0,"show_on_nav_menu":1,"show_on_home":0,"show_on_footer":0,"show_on_sidebar":0,"show_on_slider":0,"show_on_top":0,"show_on_bottom":0,"icon":null,"image":null,"keywords":null,"description":null,"bg_color":null,"text_color":null,"border_color":null,"created_by":1,"updated_by":1,"deleted_by":null,"deleted_at":null,"created_at":"2024-10-08T08:36:05.000000Z","updated_at":"2024-10-08T08:36:05.000000Z","pivot":{"product_id":742,"category_id":20}}] 
        

        $tags = Tag::all();
        $pageTitle = $product->name;

        return view('frontend.pages.product-detail', compact('product', 'relatedCategories', 'tags', 'pageTitle'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function deliveryInformation()
    {
        return view('frontend.pages.delivery-information');
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }

    public function termsOfService()
    {
        return view('frontend.pages.terms-of-service');
    }

    public function returnPolicy()
    {
        return view('frontend.pages.return-policy');
    }
}
