<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Attribute;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Fetch products with pagination and search functionality
        $products = Product::with('variations', 'attributes', 'tags', 'images')
            ->when($search, function($query) use ($search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            })->orderBy('name')->paginate(10)->withQueryString();

        $pageTitle = 'Products';

        return view('admin.products.index', compact('products', 'search', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get the list of tags in alphabetical order
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $pageTitle = 'Create Product';
        return view('admin.products.create', compact('pageTitle', 'tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'sku' => 'required|string|max:255|unique:products,sku',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'variations' => 'nullable|array',
            'variations.*.variation_type' => 'nullable|string|max:255',
            'variations.*.variation_value' => 'nullable|string|max:255',
            'variations.*.price' => 'nullable|numeric',
            'variations.*.stock_quantity' => 'nullable|integer',
            'attributes' => 'nullable|array',
            'attributes.*.key' => 'nullable|string|max:255',
            'attributes.*.value' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*.image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'images.*.caption' => 'nullable|string|max:255',
            'images.*.order' => 'nullable|integer',
            'images.*.is_active' => 'nullable|boolean',
        ]);

        // Create the product
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;

        // Handle product image upload
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        // Attach categories
        $product->categories()->attach($request->categories);

        // Handle tags
        if ($request->tags) {
            $tags = array_map('trim', explode(',', $request->tags));
            foreach ($tags as $tagName) {
                $slug = Str::slug($tagName); // Generate a slug from the tag name
                $tag = Tag::firstOrCreate(['name' => $tagName], ['slug' => $slug]); // Create or retrieve the tag with slug
                $product->tags()->attach($tag);
            }
        }

        // Handle variations
        if ($request->variations) {
            foreach ($request->variations as $variation) {
                $product->variations()->create([
                    'variation_type' => $variation['variation_type'],
                    'variation_value' => $variation['variation_value'],
                    'price' => $variation['price'],
                    'stock_quantity' => $variation['stock_quantity'],
                ]);
            }
        }

        // Handle attributes
        if ($request->attributes) {
            foreach ($request->attributes as $attribute) {
                $product->attributes()->create([
                    'key' => $attribute['key'],
                    'value' => $attribute['value'],
                ]);
            }
        }

        // Handle additional images
        if ($request->images) {
            foreach ($request->images as $image) {
                if ($image['image_path']) {
                    $path = $image['image_path']->store('product_images', 'public');
                    $product->images()->create([
                        'image_path' => $path,
                        'caption' => $image['caption'],
                        'order' => $image['order'],
                        'is_active' => $image['is_active'] ?? false,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the product
        $product = Product::with('variations', 'attributes', 'tags', 'images')->findOrFail($id);

        $pageTitle = 'Product Details: ' . $product->name;

        return view('admin.products.show', compact('product', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
         // get the list of tags in alphabetical order
        $tags = Tag::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        
        $pageTitle = 'Edit Product: ' . $product->name;
        return view('admin.products.edit', compact('product', 'pageTitle', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|unique:products,slug,' . $product->id,
                'description' => 'nullable|string',
                'sku' => 'required|string|unique:products,sku,' . $product->id,
                'price' => 'required|numeric',
                'stock_quantity' => 'required|integer',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'variations.*.variation_type' => 'required|string',
                'variations.*.variation_value' => 'required|string',
                'variations.*.price' => 'nullable|numeric',
                'variations.*.stock_quantity' => 'required|integer',
                'attributes.*.key' => 'required|string',
                'attributes.*.value' => 'required|string',
                'tags' => 'array',
                'images.*.image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'images.*.caption' => 'nullable|string',
            ]);

            // Update product
            $product->update($request->only(['name', 'slug', 'description', 'sku', 'price', 'stock_quantity', 'image']));

            // Update variations
            if ($request->has('variations')) {
                foreach ($request->variations as $variationData) {
                    // Logic to update existing variations or create new ones
                    ProductVariation::updateOrCreate(
                        ['id' => $variationData['id'] ?? null, 'product_id' => $product->id],
                        $variationData
                    );
                }
            }

            // Update attributes
            if ($request->has('attributes')) {
                foreach ($request->attributes as $attributeData) {
                    Attribute::updateOrCreate(
                        ['id' => $attributeData['id'] ?? null, 'product_id' => $product->id],
                        $attributeData
                    );
                }
            }

            // Attach tags
            if ($request->has('tags')) {
                $product->tags()->sync($request->tags);
            }

            // Store images
            if ($request->has('images')) {
                foreach ($request->images as $imageData) {
                    $path = $imageData['image_path']->store('product_images', 'public');
                    $product->images()->create([
                        'image_path' => $path,
                        'caption' => $imageData['caption'],
                    ]);
                }
            }

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
