<?php

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

if (! function_exists('getMenuCategories')) {
    function getMenuCategories()
    {
        $data = Cache::rememberForever('menu_categories', function () {
            return Category::with('submenus')
                ->where('is_active', true)
                ->where('is_menu', true)
                ->where('show_on_nav_menu', true)
                ->orderBy('order_column', 'asc')
                ->get();
        });
        return  $data;
    }
}
