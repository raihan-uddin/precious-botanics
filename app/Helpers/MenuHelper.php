<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

if (!function_exists('getMenuCategories')) {
    function getMenuCategories()
    {
        return Cache::rememberForever('menu_categories', function () {
            return Category::with('submenus')
                ->where('is_active', true)
                ->where('is_menu', true)
                ->where('show_on_nav_menu', true)
                ->orderBy('order_column', 'asc')
                ->get();
        });
    }
}
