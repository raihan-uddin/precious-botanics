<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class ProductController extends Controller
{
    

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

        $pageTitle = $product->name;

        return view('frontend.pages.product-detail', compact('product', 'relatedProducts', 'pageTitle'));
    }
    
    // show product on modal
    public function quickView(Request $request)
    {
        // validate request
        $request->validate([
            'id' => 'required|integer|exists:products,id'
        ]);

        $id = $request->input('id');

        $product = Product::with(['variants', 'categories', 'images'])->where('id', $id)->first();
        if (!$product) {
            abort(404);
        }

        return view('frontend.pages.quick-view', compact('product'));
    }
}
