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
        ]);
    }
}
