<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['key'];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function variations()
    {
        return $this->belongsToMany(ProductVariation::class, 'product_variation_attributes')
            ->withPivot('value'); // Adjust based on your needs
    }
}
