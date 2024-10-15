<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::active()->get();
        $products = Product::published()->get();
        $banners = Banner::active()->orderBy('order_column', 'desc')->get();

        $sliders = $banners->where('section', 'slider');
        $featuredBanners = $banners->where('section', 'featured');

        $tags = Tag::all();


        $mostLovedProducts = Product::with([
            'variants:id,product_id,size,color,price,sku,stock',
            'categories'
        ])
            ->whereHas('variants')
            ->published()
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
            ->published()
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
                    $query->published();
                    $query->take(24);
                }
            ])
            ->showOnHome()
            ->whereHas('products', function ($query) {
                $query->published();
            })
            ->take(6)
            ->get();

        return view('frontend.pages.home', compact('categories', 'products', 'banners', 'tags', 'sliders', 'featuredBanners', 'mostLovedProducts', 'latestProducts', 'latestCategories'));
    }


    public function categoryProducts($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        // Get the sort_by parameter from the request
        $sortBy = $request->input('sort_by');

        $allCategories = Category::withCount('products')->active()->get();
        $products = $category->products();

        $products = $products->published();
        // if request sort_by then sort products (position, relevance, name_asc, name_desc, price_asc, price_desc, newest, oldest)

        switch ($sortBy) {
            case 'name_asc':
                $products = $products->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $products = $products->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'newest':
                $products = $products->latest();
                break;
            case 'oldest':
                $products = $products->oldest();
                break;
            default:
                $products = $products->orderBy('id', 'desc');
                break;
        }
        // Apply sorting based on the sort_by value
        $products = $products->paginate(12);
        

        return view('frontend.pages.category-product', compact('category', 'products', 'allCategories'));
    }

    public function tagProducts($slug, Request $request)
    {
        $tag = Tag::where('slug', $slug)->first();
        if (!$tag) {
            abort(404);
        }

        // Get the sort_by parameter from the request
        $sortBy = $request->input('sort_by');

        $allCategories = Category::withCount('products')->active()->get();

        $products = $tag->products()->published();
        switch ($sortBy) {
            case 'name_asc':
                $products = $products->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $products = $products->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'newest':
                $products = $products->latest();
                break;
            case 'oldest':
                $products = $products->oldest();
                break;
            default:
                $products = $products->orderBy('id', 'desc');
                break;
        }
        // Apply sorting based on the sort_by value
        $products = $products->paginate(12);

        return view('frontend.pages.tag-products', compact('tag', 'products', 'allCategories'));
    }



    public function productDetail($category_slug, $slug)
    {
        $product = Product::with(['variants', 'categories', 'images'])->where('slug', $slug)->first();
      
        // if product not found then show 404 page
        if (!$product) {
            abort(404);
        }

        //  get related products by category
        $relatedCategories = $product->categories;
        $relatedProducts = Product::with(['variants', 'categories', 'images'])
            ->whereHas('categories', function ($query) use ($relatedCategories) {
                $query->whereIn('categories.id', $relatedCategories->pluck('id'));
            })
            ->where('id', '!=', $product->id)
            ->published()
            ->take(8)
            ->get();

        info($relatedProducts);
        $pageTitle = $product->name;

        return view('frontend.pages.product-detail', compact('product', 'relatedProducts', 'pageTitle'));
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
