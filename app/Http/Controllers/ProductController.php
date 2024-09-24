<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Attribute;
use App\Models\Tag;

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
        $pageTitle = 'Create Product';
        return view('admin.products.create', compact('pageTitle', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|unique:products',
                'description' => 'nullable|string',
                'sku' => 'required|string|unique:products',
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
                'images.*.image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'images.*.caption' => 'nullable|string',
            ]);

            // Create product
            $product = Product::create($request->only(['name', 'slug', 'description', 'sku', 'price', 'stock_quantity', 'image']));

            // Store variations
            if ($request->has('variations')) {
                foreach ($request->variations as $variationData) {
                    $product->variations()->create($variationData);
                }
            }

            // Store attributes
            if ($request->has('attributes')) {
                foreach ($request->attributes as $attributeData) {
                    $product->attributes()->create($attributeData);
                }
            }

            // Attach tags
            if ($request->has('tags')) {
                $product->tags()->attach($request->tags);
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

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
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
        $pageTitle = 'Edit Product: ' . $product->name;
        return view('admin.products.edit', compact('product', 'pageTitle'));
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
