<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Attribute;
use App\Models\Image;
use App\Models\Variation;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Fetch all categories and tags
        $categories = Category::all()->pluck('id')->toArray();
        $tags = Tag::all()->pluck('id')->toArray();
        
        // Example attributes
        $attributes = [
            ['name' => 'Size'],
            ['name' => 'Color'],
            ['name' => 'Weight'],
        ];

        // Create attributes if they don't exist
        foreach ($attributes as $attribute) {
            Attribute::firstOrCreate($attribute);
        }

        // Example products with realistic data
        $products = [
            [
                'name' => 'Premium Coffee Beans',
                'sku' => 'CFF-001',
                'price' => 19.99,
                'stock_quantity' => 150,
                'description' => $faker->paragraph,
                'is_active' => 1,
                'tags' => ['coffee', 'premium', 'organic'],
                'attributes' => [
                    ['name' => 'Size', 'value' => '1kg'],
                    ['name' => 'Flavor', 'value' => 'Dark Roast'],
                ],
                'variations' => [
                    ['color' => 'Brown', 'size' => '1kg'],
                    ['color' => 'Dark Brown', 'size' => '2kg'],
                ],
                'images' => [
                    'coffee_beans_1.jpg',
                    'coffee_beans_2.jpg',
                ],
            ],
            [
                'name' => 'Leather Wallet',
                'sku' => 'LWL-002',
                'price' => 49.99,
                'stock_quantity' => 100,
                'description' => $faker->paragraph,
                'is_active' => 1,
                'tags' => ['wallet', 'leather', 'fashion'],
                'attributes' => [
                    ['name' => 'Color', 'value' => 'Black'],
                    ['name' => 'Material', 'value' => 'Genuine Leather'],
                ],
                'variations' => [
                    ['color' => 'Black', 'size' => 'Standard'],
                    ['color' => 'Brown', 'size' => 'Standard'],
                ],
                'images' => [
                    'leather_wallet_1.jpg',
                    'leather_wallet_2.jpg',
                ],
            ],
            [
                'name' => 'Running Shoes',
                'sku' => 'RS-003',
                'price' => 89.99,
                'stock_quantity' => 75,
                'description' => $faker->paragraph,
                'is_active' => 1,
                'tags' => ['shoes', 'running', 'sports'],
                'attributes' => [
                    ['name' => 'Size', 'value' => '10'],
                    ['name' => 'Color', 'value' => 'Blue'],
                ],
                'variations' => [
                    ['color' => 'Blue', 'size' => '10'],
                    ['color' => 'Red', 'size' => '10'],
                ],
                'images' => [
                    'running_shoes_1.jpg',
                    'running_shoes_2.jpg',
                ],
            ],
            // Add more products as needed
        ];

        foreach ($products as $productData) {
            // Generate a unique slug
            $slug = Str::slug($productData['name']);
            $originalSlug = $slug;
            $counter = 1;

            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Create the product
            $product = Product::create([
                'name' => $productData['name'],
                'sku' => $productData['sku'],
                'price' => $productData['price'],
                'stock_quantity' => $productData['stock_quantity'],
                'description' => $productData['description'],
                'slug' => $slug,
                'is_active' => $productData['is_active'],
            ]);

            // Attach categories
            $product->categories()->attach($categories[array_rand($categories)]);

            // Attach tags
            foreach ($productData['tags'] as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $product->tags()->attach($tag);
            }

            // Add attributes
            foreach ($productData['attributes'] as $attributeData) {
                $attribute = Attribute::where('name', $attributeData['name'])->first();
                if ($attribute) {
                    $product->attributes()->attach($attribute->id, ['value' => $attributeData['value']]);
                }
            }

            // Add variations
            foreach ($productData['variations'] as $variationData) {
                ProductVariation::create([
                    'product_id' => $product->id,
                    'color' => $variationData['color'],
                    'size' => $variationData['size'],
                ]);
            }

            // Add images
            foreach ($productData['images'] as $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'images/products/' . $image, // Assuming you store images in this path
                ]);
            }
        }
    }
}
