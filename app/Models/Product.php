<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sku',
        'price',
        'discount_price',
        'stock_quantity',
        'in_stock',
        'is_active',
        'is_featured',
        'meta_title',
        'meta_description',
        'image',
    ];


    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes'); // Adjust according to your pivot table
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relationship with ProductImage
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    
    public function getFeaturedImageAttribute()
    {
        return $this->images->where('is_featured', true)->first();
    }

    public function getGalleryImagesAttribute()
    {
        return $this->images->where('is_featured', false);
    }

    public function getThumbnailAttribute()
    {
        return $this->featured_image ? $this->featured_image->image_path : null;
    }
}
