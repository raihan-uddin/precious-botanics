<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

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
