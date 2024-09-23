<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search query
        $search = $request->input('search');

        // Fetch categories with pagination and search functionality
        $categories = Category::when($search, function($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        })->orderBy('name')
        ->paginate(10); // Adjust the number per page as needed

        return view('admin.categories.index', compact('categories', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'order_column' => 'required|integer',
            'icon' => 'nullable|string',
            'image' => 'nullable|file|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $category = new Category();
        $category->name = $validated['name'];
        $category->slug = $validated['slug'];
        $category->order_column = $validated['order_column'];
        $category->icon = $validated['icon'] ?? null; // Handle nullable icon
        $category->image = $validated['image'] ?? null; // Handle nullable image
        $category->is_menu = $request->boolean('is_menu');
        $category->is_active = $request->boolean('is_active');
        $category->show_on_home = $request->boolean('show_on_home');
        $category->show_on_menu = $request->boolean('show_on_menu');
        $category->show_on_footer = $request->boolean('show_on_footer');
        $category->show_on_sidebar = $request->boolean('show_on_sidebar');
        $category->show_on_header = $request->boolean('show_on_header');
        $category->show_on_slider = $request->boolean('show_on_slider');
        $category->show_on_top = $request->boolean('show_on_top');
        $category->show_on_bottom = $request->boolean('show_on_bottom');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id . '|max:255',
            'order_column' => 'required|integer',
            'icon' => 'nullable|string',
            'image' => 'nullable|file|image|max:2048',
        ]);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Optionally delete the old image if you want
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        // Update the category attributes
        $category->name = $validated['name'];
        $category->slug = $validated['slug'];
        $category->order_column = $validated['order_column'];
        $category->icon = $validated['icon'] ?? null; // Handle nullable icon
        $category->image = $validated['image'] ?? $category->image; // Keep old image if not updated
        $category->is_menu = $request->boolean('is_menu');
        $category->is_active = $request->boolean('is_active');
        $category->show_on_home = $request->boolean('show_on_home');
        $category->show_on_menu = $request->boolean('show_on_menu');
        $category->show_on_footer = $request->boolean('show_on_footer');
        $category->show_on_sidebar = $request->boolean('show_on_sidebar');
        $category->show_on_header = $request->boolean('show_on_header');
        $category->show_on_slider = $request->boolean('show_on_slider');
        $category->show_on_top = $request->boolean('show_on_top');
        $category->show_on_bottom = $request->boolean('show_on_bottom');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
