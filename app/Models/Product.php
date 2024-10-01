<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'sku',
        'price',
        'discount_price',
        'tax_rate',
        'is_taxable',
        'stock_quantity',
        'in_stock',
        'allow_out_of_stock_orders',
        'low_stock_threshold',
        'min_order_quantity',
        'max_order_quantity',
        'barcode',
        'weight',
        'length',
        'width',
        'height',
        'is_featured',
        'is_visible',
        'is_digital',
        'status',
        'published_at',
        'recommended_products',
        'allow_reviews',
        'average_rating',
        'total_reviews',
        'is_on_promotion',
        'promotion_details',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
        'recommended_products' => 'array',
        'promotion_details' => 'array',
        'is_taxable' => 'boolean',
        'is_featured' => 'boolean',
        'is_visible' => 'boolean',
        'is_digital' => 'boolean',
        'allow_out_of_stock_orders' => 'boolean',
        'allow_reviews' => 'boolean',
        'is_on_promotion' => 'boolean',
    ];


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function variants(): HasMany
    {
        return $this->HasMany(Variant::class,  'product_id', 'id');
    }

    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }

    // Relationship with ProductImage
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // Accessor for full image URL
    public function getImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }


    public function getGalleryImagesAttribute()
    {
        return $this->images->where('is_featured', false);
    }



    // Accessor to calculate the final price including tax
    public function getFinalPriceAttribute()
    {
        return $this->is_taxable 
            ? round($this->price * (1 + $this->tax_rate / 100), 2) 
            : $this->price;
    }
    
    // Accessor to calculate discount percentage
    public function getDiscountPercentageAttribute()
    {
        return $this->discount_price 
            ? round((($this->price - $this->discount_price) / $this->price) * 100, 2)
            : 0;
    }


    /**
     * Scopes
     */
    // Scope for filtering published products
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope for filtering featured products
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for filtering visible products
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }


    /**
     * Custom Methods
     */

    // Check if the product is on sale (has a discount)
    public function isOnSale()
    {
        return $this->discount_price && $this->discount_price < $this->price;
    }

    // Calculate the final price after discount
    public function finalPrice()
    {
        return $this->isOnSale() ? $this->discount_price : $this->price;
    }

    // Check if the product is in stock
    public function isInStock()
    {
        return $this->stock_quantity > 0 && $this->in_stock;
    }

    // Check if out of stock orders are allowed
    public function canOrderWhenOutOfStock()
    {
        return $this->allow_out_of_stock_orders;
    }

}
