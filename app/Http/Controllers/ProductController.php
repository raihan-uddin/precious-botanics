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
        // Initialize the query
        $query = Product::query();

        // Filters
        if ($request->has('filter')) {
            $filters = $request->get('filter');

            // Filter by name
            if (!empty($filters['name'])) {
                $query->where('name', 'like', '%' . $filters['name'] . '%');
            }

            // Filter by price range (min and max)
            if (!empty($filters['min_price'])) {
                $query->where('price', '>=', $filters['min_price']);
            }

            if (!empty($filters['max_price'])) {
                $query->where('price', '<=', $filters['max_price']);
            }

            // Filter by status
            if (!empty($filters['status'])) {
                $query->where('status', $filters['status']);
            }
        }

        // Get paginated results
        $products = $query->paginate(10)->withQueryString();

        
        $pageTitle = 'Products';

        // Pass filters to the view to maintain the state
        return view('admin.products.index', [
            'pageTitle' => $pageTitle,
            'products' => $products,
            'filter' => $request->get('filter', []),  // To maintain the filter state in the view
        ]);
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
        info($request->all());
        // validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products',
            'description' => 'nullable|string',
            'sku' => 'required|string|unique:products',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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

        $product = new Product();
    
        // Set product details without mass assignment
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->sku = $request->sku;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->tax_rate = $request->tax_rate;
        $product->is_taxable = $request->is_taxable;
        $product->stock_quantity = $request->stock_quantity;
        $product->in_stock = $request->in_stock;
        $product->allow_out_of_stock_orders = $request->allow_out_of_stock_orders;
        // $product->is_on_sale = $request->is_on_sale;
        $product->min_order_quantity = $request->min_order_quantity;
        $product->max_order_quantity = $request->max_order_quantity;
        $product->barcode = $request->barcode;
        $product->weight = $request->weight;
        $product->length = $request->length;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->is_featured = $request->is_featured;
        $product->is_visible = $request->is_visible;
        $product->is_digital = $request->is_digital;
        $product->status = $request->status;
    
        // Product image upload
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }
    
        $product->save();
    
        // Attach categories
        if ($request->categories) {
            $product->categories()->attach($request->categories);
        }
    
        // Handle tags
        if ($request->tags) {
            $tags = array_map('trim', explode(',', $request->tags));
            foreach ($tags as $tagName) {
                $slug = Str::slug($tagName);
                $tag = Tag::firstOrCreate(['name' => $tagName], ['slug' => $slug]);
                $product->tags()->attach($tag);
            }
        }
    
        // Save additional images
        if ($request->has('additional_images')) {
            foreach ($request->file('additional_images') as $image) {
                $product->images()->create([
                    'image_path' => $image->store('product_images', 'public'),
                    'is_featured' => $request->input('is_featured', 0),
                    'order_column' => $request->input('order', null),
                ]);
            }
        }
    
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
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
