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
        ->paginate(10)->withQueryString();
        
        return view('admin.categories.index', compact('categories', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Fetch all menus
        $menus = Category::where('is_menu', true)->orderBy('name')->get(); 
    
        return view('admin.categories.create', compact('menus'));
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
            'menus' => 'required|array',
            'menus.*' => 'exists:categories,id', // Validate that each menu exists in the database
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
        $category->show_on_nav_menu = $request->boolean('show_on_nav_menu');
        $category->show_on_footer = $request->boolean('show_on_footer');
        $category->show_on_sidebar = $request->boolean('show_on_sidebar');
        $category->show_on_slider = $request->boolean('show_on_slider');
        $category->show_on_top = $request->boolean('show_on_top');
        $category->show_on_bottom = $request->boolean('show_on_bottom');
        $category->save();

        // Attach the selected menus to the category
        $category->menus()->attach($validated['menus']);

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
        // Fetch all menus
        $menus = Category::where('is_menu', true)->orderBy('name')->get();
        return view('admin.categories.edit', compact('category', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'order_column' => 'required|integer',
            'menus' => 'array',
            'is_active' => 'boolean',
            'is_menu' => 'boolean',
            'show_on_home' => 'boolean',
            'show_on_nav_menu' => 'boolean',
            'show_on_footer' => 'boolean',
            'show_on_sidebar' => 'boolean',
            'show_on_slider' => 'boolean',
            'show_on_top' => 'boolean',
            'show_on_bottom' => 'boolean',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->order_column = $request->order_column;
        $category->is_active = $request->is_active ?? 0;
        $category->is_menu = $request->is_menu ?? 0;
        $category->show_on_home = $request->show_on_home ?? 0;
        $category->show_on_nav_menu = $request->show_on_nav_menu ?? 0;
        $category->show_on_footer = $request->show_on_footer ?? 0;
        $category->show_on_sidebar = $request->show_on_sidebar ?? 0;
        $category->show_on_slider = $request->show_on_slider ?? 0;
        $category->show_on_top = $request->show_on_top ?? 0;
        $category->show_on_bottom = $request->show_on_bottom ?? 0;
        $category->icon = $request->icon;

        if ($request->hasFile('image')) {
            // Store the new image
            if ($category->image) {
                Storage::delete($category->image); // Delete old image if exists
            }
            $category->image = $request->file('image')->store('categories');
        }

        $category->save();

        // Sync menus
        $category->menus()->sync($request->menus);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
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
