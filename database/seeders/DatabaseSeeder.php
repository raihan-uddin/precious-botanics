<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'Raihan Uddin',
                'email' => 'raihan@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
                'status' => 'active',
                'timezone' => 'Asia/Dhaka',
                'currency' => 'USD',
            ]
        );

        User::factory()->create(
            [
                'name' => 'Pavel Khalil',
                'email' => 'pavel@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
                'status' => 'active',
                // timezone usa
                'timezone' => 'America/New_York',
                'currency' => 'USD',
            ]
        );

        $this->call(SettingsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
