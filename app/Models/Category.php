<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order_column',
        'icon',
        'image',
        'is_menu',
        'is_active',
        'show_on_home',
        'show_on_menu',
        'show_on_footer',
        'show_on_sidebar',
        'show_on_header',
        'show_on_slider',
        'show_on_top',
        'show_on_bottom',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // For menus linked to submenus
    public function submenus()
    {
        return $this->belongsToMany(Category::class, 'category_menu', 'menu_id', 'submenu_id');
    }

    // For submenus linked to menus
    public function menus()
    {
        return $this->belongsToMany(Category::class, 'category_menu', 'submenu_id', 'menu_id');
    }
}
