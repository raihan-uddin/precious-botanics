<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            ['key' => 'site_name', 'value' => 'Precious Botanics', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_email', 'value' => 'info@preciousbotanic.com', 'type' => 'email', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_phone', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_address', 'value' => '234 E 47th street, Chicago iI 60653', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            // google map
            ['key' => 'latitude', 'value' => '41.8094254', 'type' => 'number', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'longitude', 'value' => '87.622386917', 'type' => 'number', 'created_at' => now(), 'updated_at' => now()],
            // ['key' => 'site_logo', 'value' => 'logo.png', 'type' => 'file', 'created_at' => now(), 'updated_at' => now()],
            // ['key' => 'site_favicon', 'value' => 'logo.png', 'type' => 'file', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'currency', 'value' => 'USD', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'currency_symbol', 'value' => '$', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'currency_position', 'value' => 'left', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'shipping_rate', 'value' => '0', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'tax_rate', 'value' => '0', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_description', 'value' => 'Health & Beauty Products', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_keywords', 'value' => 'Precious Botanics, Health  & Beauty Products', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_author', 'value' => 'Precious Botanics', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_google_analytics', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_facebook', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_instagram', 'value' => 'https://www.instagram.com/preciousbotanic2024', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_linkedin', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_youtube', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_whatsapp', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_telegram', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_snapchat', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_tiktok', 'value' => 'https://www.tiktok.com/@preciousbotanic', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            // Google ReCapcha *
            ['key' => 'capcha', 'value' => 0, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'recaptcha_site_key', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'recaptcha_secret_key', 'value' => '', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],

            // Cookie
            ['key' => 'cookie', 'value' => 1, 'type', 'boolean', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_message', 'value' => 'We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you are happy with it.', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_button', 'value' => 'Accept', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_policy', 'value' => 'Privacy Policy', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_link', 'value' => 'privacy-policy', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_position', 'value' => 'bottom', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cookie_expire', 'value' => 365, 'type' => 'number', 'created_at' => now(), 'updated_at' => now()],

            // Control Home Page
            // show slider
            ['key' => 'show_slider', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            // show featured products
            ['key' => 'show_featured_products', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            // show latest products
            ['key' => 'show_latest_products', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            // show popular products
            ['key' => 'show_popular_products', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            // show best selling products
            ['key' => 'show_best_selling_products', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            // show blog
            ['key' => 'show_blog', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            // show featured categories
            ['key' => 'show_featured_categories', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            // show testimonials
            ['key' => 'show_testimonials', 'value' => 1, 'type' => 'boolean', 'created_at' => now(), 'updated_at' => now()],
            

        ]);
    }
}
